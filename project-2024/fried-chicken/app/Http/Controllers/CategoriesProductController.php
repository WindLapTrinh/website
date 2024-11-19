<?php

namespace App\Http\Controllers;

use App\Models\CategoriesProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesProductController extends Controller
{
    function list(Request $request)
    {
        $status = $request->input('status');

        $list_act = [
            'delete' => 'Xóa tạm thời'
        ];

        if ($status == "trash") {
            $list_act = [
                'restore' => 'Khôi phục',
                'forceDelete' => 'Xóa vĩnh viễn'
            ];
            // Get only trashed categories with parent_id = 0
            $categories = CategoriesProduct::onlyTrashed()->paginate(10);
        } else {
            $keyword = $request->input('keyword', '');

            // Get only active categories with parent_id = 0 and filter by keyword
            $categories = CategoriesProduct::where('parent_id', 0)
                ->where('name', 'LIKE', "%{$keyword}%")
                ->paginate(10);
        }

        // Count all categories and trashed categories with parent_id = 0
        $const_category_active = CategoriesProduct::where('parent_id', 0)->count();
        $const_category_trash = CategoriesProduct::onlyTrashed()->count();
        $count = [$const_category_active, $const_category_trash];

        return view('admin.product.cat', compact('categories', 'count', 'request', 'list_act'));
    }   

    function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string',    
            'parent_id' => 'nullable|integer'
        ]);

        $parent_id = $request->parent_id ?? 0;
        CategoriesProduct::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'desc' => $request->desc,
            'user_id' => auth()->id(),
            'parent_id' => $parent_id,
        ]);
        return redirect()->route('category.product.list')->with('status', 'Thông tin danh mục đã được lưu !');
    }

    function update(Request $request , $id){
        $category = CategoriesProduct::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'desc' => $request->input('desc'),
            'parent_id' => $request->input('parent_id')
        ]);

        return redirect()->route('category.product.list')->with('status', 'Danh mục đã cập nhập thông tin thành công');
    }

    function delete($id){
        $category = CategoriesProduct::find($id);
        if($category){
            $this->deleteSubcategories($category->id);
            $category->delete();
        }
        return redirect()->route('category.product.list')->with('status', 'Bạn đã xóa danh mục sản phẩm thành công !');
    }

    private function deleteSubcategories($parentId)
    {
        $subcategories = CategoriesProduct::where('parent_id', $parentId)->get();

        foreach ($subcategories as $subcategory) {
            $this->deleteSubcategories($subcategory->id);
            $subcategory->delete();
        }
    }

    public function showSubcategories(Request $request, $parentId)
    {
        $parentCategory = CategoriesProduct::findOrFail($parentId);

        $status = $request->input('status');

        $list_act = [
            'delete' => 'Xóa tạm thời'
        ];

        if ($status == "trash") {
            $list_act = [
                'restore' => 'Khôi phục',
                'forceDelete' => 'Xóa vĩnh viễn'
            ];

            $categories = CategoriesProduct::onlyTrashed()->paginate(10);
        } else {
            $keyword = $request->input('keyword', '');

            $categories = CategoriesProduct::where('parent_id', $parentId)
                ->where('name', 'LIKE', "%{$keyword}%")
                ->paginate(10);
        }
        $const_category_active = CategoriesProduct::where('parent_id', $parentId)->count();
        $const_category_trash = CategoriesProduct::onlyTrashed()->count();
        $count = [$const_category_active, $const_category_trash];

        $allCategories = CategoriesProduct::where('parent_id', 0)->with('children')->get();

        return view('admin.product.subcategories', compact('parentCategory', 'count', 'categories', 'allCategories', 'status', 'list_act', 'request'));
    }

    public function action(Request $request){
        $list_check = $request->input('list_check');

        if($list_check) {
            foreach($list_check as $k => $id){
                $category_product = CategoriesProduct::find($id);

                if($category_product && auth()->id() == $category_product->id){
                    unset($list_check[$k]);
                }
            }
        }

        if(!empty($list_check)) {
            $act = $request->input('act');

            if($act == "delete"){
                CategoriesProduct::destroy($list_check);
                return redirect()->route('category.product.list')->with('status', 'Bạn đã xóa thành công');
            }

            if($act == "restore"){
                $category_products = CategoriesProduct::withTrashed()->whereIn('id', $list_check)->get();

                foreach($category_products as $category_product ){
                    $category_product->restore();

                }

                return redirect()->route('category.product.list')->with('status', 'Bạn đã khôi phục dữ liệu thành công');
            }

            if($act == "forceDelete"){

                CategoriesProduct::withTrashed()->whereIn('id', $list_check)->forceDelete();
                return redirect()->route('category.product.list')->with('status', 'Bạn đã xóa vĩnh viễn thành công');
            
            }
            return redirect()->route('category.product.list')->with('status', 'Bạn không có quyền thao tác chức năng này !');
        }else{
            return redirect()->route('category.product.list')->with('status', 'Bạn cần chọn phần tử thực hiện !');
        }

    }
}
