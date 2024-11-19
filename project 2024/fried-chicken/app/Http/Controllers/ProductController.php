<?php

namespace App\Http\Controllers;

use App\Models\CategoriesProduct;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //template
    public function getAll(Request $request)
    {
        $sortOption = $request->input('soft', 0);
        $priceFilter = $request->input('price');
        $query = Product::query();
    
        switch ($sortOption) {
            case 1: // Từ A-Z
                $query->orderBy('name', 'asc');
                break;
            case 2: // Từ Z-A
                $query->orderBy('name', 'desc');
                break;
            case 3: // Giá cao xuống thấp
                $query->orderBy('price', 'desc');
                break;
            case 4: // Giá thấp lên cao
                $query->orderBy('price', 'asc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        if ($priceFilter) {
            switch ($priceFilter) {
                case 'under_500':
                    $query->where('price', '<', 500000);
                    break;
                case '500_1000':
                    $query->whereBetween('price', [500000, 1000000]);
                    break;
                case '1000_5000':
                    $query->whereBetween('price', [1000000, 5000000]);
                    break;
                case '5000_10000':
                    $query->whereBetween('price', [5000000, 10000000]);
                    break;
                case 'above_10000':
                    $query->where('price', '>', 10000000);
                    break;
            }
        }
    
        $products = $query->paginate(12);
        $categories = CategoriesProduct::with('children')->where('parent_id', 0)->get();
        $cartItems = session()->get('cart', []);
        $totalPrice = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cartItems));

        return view('template.product', compact('products','totalPrice', 'cartItems', 'categories'));
    }  

    // admin
    function list(Request $request)
    {
        // Lấy danh mục cha
        $categories = CategoriesProduct::where('parent_id', 0)->get();

        // Lấy giá trị status từ request
        $status = $request->input('status');

        // Khởi tạo danh sách hành động mặc định
        $list_act = ['Xóa tạm thời'];

        if ($status == "trash") {
            // Nếu là trạng thái 'trash', lấy sản phẩm soft-deleted và cập nhật danh sách hành động
            $products = Product::onlyTrashed()->paginate(10);
            $list_act = [
                'restore' => 'Khôi phục',
                'forceDelete' => 'Xóa vĩnh viễn'
            ];
        } else {
            // Nếu không phải 'trash', tìm kiếm sản phẩm chưa xóa theo từ khóa (nếu có)
            $keyword = $request->input('keyword', ''); // mặc định là chuỗi rỗng nếu không có từ khóa
            $products = Product::where("name", "LIKE", "%{$keyword}%")->paginate(10);
        }

        // Đếm số lượng sản phẩm chưa bị soft-deleted và đã bị soft-deleted
        $count_product_active = Product::count();
        $count_product_trash = Product::onlyTrashed()->count();

        // Mảng đếm sản phẩm
        $count = [$count_product_active, $count_product_trash];

        // Trả về view với các dữ liệu cần thiết
        return view('admin.product.list', compact('products', 'categories', 'count', 'request', 'list_act'));
    }

    function add()
    {
        $categories = CategoriesProduct::where('parent_id', 0)->get();
        return view('admin.product.add', compact('categories'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|max:255',
                'price' => 'required|integer',
                'stock_quantity' => 'required|integer',
                'category_id' => 'required|exists:categories_product,id',
                'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            //new product
            $product = new Product();
            $product->name = $request->name;
            $product->desc = $request->desc;
            $product->details = $request->details;
            $product->price = $request->price;
            $product->stock_quantity = $request->stock_quantity;
            $product->is_featured = $request->is_featured;
            $product->product_status = $request->product_status;
            $product->category_id = $request->category_id;
            $product->user_id = auth()->id();

            $product->save();

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imageSize = $image->getSize();
                    $imageName = time() . '-' . $image->getClientOriginalName();
                    $image->move(public_path('images'), $imageName);

                    // Tạo bản ghi trong bảng images
                    $imageModel = new Image();
                    $imageModel->url = 'images/' . $imageName;
                    $imageModel->name = $imageModel->url;
                    $imageModel->size = $imageSize;
                    $imageModel->user_id = auth()->id();
                    $imageModel->save();

                    // Lưu vào bảng trung gian product_image
                    $productImage = new ProductImage();
                    $productImage->product_id = $product->id;
                    $productImage->image_id = $imageModel->id;
                    $productImage->save();
                }
            }

            return redirect()->back()->with('status', 'Thêm sản phẩm thành công!');
        } catch (\Exception $e) {
            Log::error('Error adding product: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            // return redirect()->back()->withErrors(['error' => 'Đã có lỗi xảy ra !']);
        }
    }

    public function update(Request $request, $id)
    { 
        try {
            //validate form data
            $request->validate([
                'name' => 'required|max:255',
                'price' => 'required|integer',
                'stock_quantity' => 'required|integer',
                'category_id' => 'required|exists:categories_product,id',
                'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
    
            // Lấy sản phẩm cần cập nhật
            $product = Product::findOrFail($id);
    
            // Cập nhật thông tin sản phẩm
            $product->name = $request->name;
            $product->desc = $request->desc;
            $product->details = $request->details;
            $product->price = $request->price;
            $product->stock_quantity = $request->stock_quantity;
            $product->is_featured = $request->is_featured;
            $product->product_status = $request->product_status;
            $product->category_id = $request->category_id;
                
            // Nếu có file hình ảnh mới, xóa ảnh cũ và thêm ảnh mới
            if ($request->hasFile('images')) {
                foreach ($product->images as $image) {
                    if (Storage::exists($image->url)) {
                        Storage::delete($image->url);
                    }
                    $image->delete();
                }
    
                // Lưu ảnh mới
                foreach ($request->file('images') as $image) {
                    $imageSize = $image->getSize();
                    $imageName = time() . '-' . $image->getClientOriginalName();
                    $image->move(public_path('images'), $imageName);
    
                    $imageModel = new Image();
                    $imageModel->url = 'images/' . $imageName;
                    $imageModel->name = $imageModel->url;
                    $imageModel->size = $imageSize;
                    $imageModel->user_id = auth()->id();
                    $imageModel->save();
    
                    // Thêm ảnh vào sản phẩm
                    $product->images()->attach($imageModel->id);
                }
            }

            // return dd($product);
            $product->save();

            return redirect()->route('product.list')->with('status', 'Sản phẩm đã được cập nhật thành công!');
        } catch (\Exception $e) {
            Log::error('Error updating product: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Đã có lỗi xảy ra khi cập nhật sản phẩm!']);
        }
    }
    
    public function delete($id)
    {
        try {
            $product = Product::findOrFail($id);

            foreach ($product->images as $image) {
                $image->delete();
            }

            $product->delete();

            return redirect()->route('product.list')->with('status', 'Sản phẩm đã được xóa tạm thời thành công!');
        } catch (\Exception $e) {
            Log::error('Error soft deleting product: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Đã có lỗi xảy ra khi xóa tạm sản phẩm!']);
        }
    }
    public function action(Request $request)
    {
        $list_check = $request->input('list_check');
        if ($list_check) {
            foreach ($list_check as $k => $id) {
                $product = Product::find($id);
                if ($product && auth()->id() == $product->id) {
                    unset($list_check[$k]);
                }
            }
        }
        if (!empty($list_check)) {
            $act = $request->input('act');
            if ($act === "delete") {
                Product::destroy($list_check);
                return redirect('admin/product/list')->with('status', 'Bạn đã xóa thành công !');
            }
            if ($act === "restore") {
                $products = Product::withTrashed()->whereIn('id', $list_check)->get();

                foreach ($products as $product) {
                    // Khôi phục sản phẩm
                    $product->restore();

                    // Khôi phục các hình ảnh liên quan qua bảng trung gian
                    $images = $product->images()->withTrashed()->get();

                    foreach ($images as $image) {
                        $image->restore(); // Khôi phục từng ảnh
                    }
                }

                return redirect('admin/product/list')->with('status', 'Bạn đã khôi phục thành công');
            }
            if ($act === "forceDelete") {
                $products = Product::withTrashed()->whereIn('id', $list_check)->get();

                foreach ($products as $product) {
                    // Lấy các hình ảnh liên quan qua bảng trung gian product_image
                    $images = $product->images()->withTrashed()->get();

                    foreach ($images as $image) {
                        // Xóa file hình ảnh khỏi public/images
                        $imagePath = public_path('images/' . $image->url);
                        if (file_exists($imagePath)) {
                            unlink($imagePath); // Xóa file
                        }
                        // Xóa hình ảnh khỏi cơ sở dữ liệu nếu muốn xóa luôn
                        $image->forceDelete();
                    }

                    // Xóa sản phẩm vĩnh viễn
                    $product->forceDelete();
                }
                return redirect('admin/product/list')->with('status', 'Bạn đã xóa vĩnh viễn thành công');
            }
            return redirect('admin/product/list')->with('status', 'Bạn không có quyền thao tác chức năng này !');
        } else {
            return redirect('admin/product/list')->with('status', 'Bạn cần chọn phần tử thực hiện');
        }
    }
}
