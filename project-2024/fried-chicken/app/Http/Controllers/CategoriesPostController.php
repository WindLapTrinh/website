<?php

namespace App\Http\Controllers;

use App\Models\CategoriesPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Ui\Presets\React;

class CategoriesPostController extends Controller
{

    public function list(Request $request)
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
            $categories = CategoriesPost::onlyTrashed()->paginate(10);
        } else {
            $keyword = $request->input('keyword', '');

            // Get only active categories with parent_id = 0 and filter by keyword
            $categories = CategoriesPost::where('parent_id', 0)
                ->where('name', 'LIKE', "%{$keyword}%")
                ->paginate(10);
        }

        // Count all categories and trashed categories with parent_id = 0
        $const_category_active = CategoriesPost::where('parent_id', 0)->count();
        $const_category_trash = CategoriesPost::onlyTrashed()->count();
        $count = [$const_category_active, $const_category_trash];

        return view('admin.post.cat', compact('categories', 'count', 'request', 'list_act'));
    }

    public function showSubcategories(Request $request, $parentId)
    {
        $parentCategory = CategoriesPost::findOrFail($parentId);

        $status = $request->input('status');

        $list_act = [
            'delete' => 'Xóa tạm thời'
        ];

        if ($status == "trash") {
            $list_act = [
                'restore' => 'Khôi phục',
                'forceDelete' => 'Xóa vĩnh viễn'
            ];

            $categories = CategoriesPost::onlyTrashed()->paginate(10);
        } else {
            $keyword = $request->input('keyword', '');

            $categories = CategoriesPost::where('parent_id', $parentId)
                ->where('name', 'LIKE', "%{$keyword}%")
                ->paginate(10);
        }
        $const_category_active = CategoriesPost::where('parent_id', $parentId)->count();
        $const_category_trash = CategoriesPost::onlyTrashed()->count();
        $count = [$const_category_active, $const_category_trash];

        $allCategories = CategoriesPost::where('parent_id', 0)->with('children')->get();

        return view('admin.post.subcategories', compact('parentCategory', 'count', 'categories', 'allCategories', 'status', 'list_act', 'request'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'parent_id' => 'nullable|integer',
        ]);

        $parent_id = $request->parent_id ?? 0;

        CategoriesPost::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'desc' => $request->desc,
            'user_id' => auth()->id(),
            'parent_id' => $parent_id,
        ]);

        return redirect()->route('category.post.list')->with('status', 'Danh mục đã được thêm!');
    }

    //update
    public function update(Request $request, $id)
    {
        $category = CategoriesPost::findOrFail($id);
        $category->update([
            'name' => $request->input('name'),
            'desc' => $request->input('desc'),
            'slug' => Str::slug($request->name),
            'parent_id' => $request->input('parent_id'),
        ]);

        return redirect()->route('category.post.list')->with('status', 'Cập nhật danh mục thành công');
    }
    // delete 
    public function delete($id)
    {
        $category = CategoriesPost::find($id);

        if ($category) {
            $this->deleteSubcategories($category->id);

            $category->delete();
        }

        return redirect()->route('category.post.list')->with('status', 'Đã xóa thông tin thành công');
    }

    private function deleteSubcategories($parentId)
    {
        $subcategories = CategoriesPost::where('parent_id', $parentId)->get();

        foreach ($subcategories as $subcategory) {
            $this->deleteSubcategories($subcategory->id);
            $subcategory->delete();
        }
    }

    public function action(Request $request)
    {
        $list_check = $request->input('list_check');

        if ($list_check) {
            foreach ($list_check as $k => $id) {
                $category_post = CategoriesPost::find($id);

                if ($category_post && auth()->id() == $category_post->id) {
                    unset($list_check[$k]);
                }
            }
        }

        if (!empty($list_check)) {
            $act = $request->input('act');

            if ($act == "delete") {
                // Find all categories including subcategories
                $categoriesToDelete = CategoriesPost::whereIn('id', $list_check)
                    ->orWhereIn('parent_id', $list_check)
                    ->get();

                // Collect IDs of parent and child categories to delete
                $idsToDelete = $categoriesToDelete->pluck('id')->toArray();

                // Delete categories by collected IDs
                CategoriesPost::destroy($idsToDelete);

                return redirect()->route('category.post.list')->with('status', 'Bạn đã xóa thành công');
            }

            if ($act == "restore") {
                // Find all categories to restore, including subcategories
                $categoriesToRestore = CategoriesPost::withTrashed()
                    ->whereIn('id', $list_check)
                    ->orWhereIn('parent_id', $list_check)
                    ->get();

                // Restore each category
                foreach ($categoriesToRestore as $category_post) {
                    $category_post->restore();
                }

                return redirect()->route('category.post.list')->with('status', 'Bạn đã khôi phục dữ liệu thành công');
            }

            if ($act == "forceDelete") {
                // Find all categories for permanent deletion, including subcategories
                $categoriesToForceDelete = CategoriesPost::withTrashed()
                    ->whereIn('id', $list_check)
                    ->orWhereIn('parent_id', $list_check)
                    ->get();

                // Force delete each category
                foreach ($categoriesToForceDelete as $category_post) {
                    $category_post->forceDelete();
                }

                return redirect()->route('category.post.list')->with('status', 'Bạn đã xóa vĩnh viễn thành công');
            }

            return redirect()->route('category.post.list')->with('status', 'Bạn không có quyền thao tác chức năng này!');
        } else {
            return redirect()->route('category.post.list')->with('status', 'Bạn cần chọn phần tử thực hiện!');
        }
    }
}
