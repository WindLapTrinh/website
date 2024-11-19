<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    //
    public function list(Request $request) {
        $status = $request->input('status');
        $list_act = ['delete' => 'Xóa tạm thời'];
    
        if ($status === 'trash') {
            $list_act = [
                'restore' => 'Khôi phục',
                'forceDelete' => 'Xóa vĩnh viễn'
            ];
            $pages = Page::onlyTrashed()->paginate(10);
        } else { 
            $keyword = $request->input('keyword', '');
            $pages = Page::where('title', 'LIKE', "%{$keyword}%")->paginate(10);
        }
        
        $const_page_active = Page::count();
        $const_page_trash = Page::onlyTrashed()->count();
    
        $count = [
            'active' => $const_page_active,
            'trash' => $const_page_trash
        ];
    
        return view('admin.pages.list', compact('count', 'pages', 'request', 'list_act'));
    }
    
    public function add(Request $request){
        //Validate form data
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'status' => 'required|in:active,pending',
        ]);
        $page = new Page();
        $page->title = $request->input('title');
        $page->slug = Str::slug($request->input('title'));
        $page->status = $request->input('status');
        $page->content = $request->input('content');
        $page->user_id = auth()->id();

        $page->save();
        return redirect()->route('page.list')->with('status', 'Bạn đã thêm trang mới thành công');
    }

    public function update(Request $request){
        $page = Page::find($request->page_id);
        // return dd($page);
        $page->title = $request->title;
        $page->slug = Str::slug($request->title);
        $page->content = $request->content;
        $page->status = $request->status;

        $page->save();

        return redirect()->route('page.list')->with('status', 'Bạn đã cập nhập trang thành công');
    }
    public function delete($id){
        $page = Page::find($id);
        if (!$page) {
            return redirect()->route('page.list')->with('status', 'Trang này không tồn tại.');
        }
        $page->delete();
        return redirect()->route('page.list')->with('status', 'Bạn đã xóa bài viết thành công');
    }
        public function action(Request $request){
            $list_check = $request->input('list_check');
            if ($list_check) {
                foreach ($list_check as $k => $id) {
                    $post = Page::find($id);
                    // Assuming you are checking if this is the authenticated user's post
                    if ($post && auth()->id() == $post->id) {
                        unset($list_check[$k]); // Don't allow the user to delete their own post
                    }
                }
            }

            if (!empty($list_check)) {
                $act = $request->input('act');
                if ($act === "delete") {
                    Page::destroy($list_check);
                    return redirect("admin/page/list")->with('status', 'Bạn đã xóa thành công');
                }
                if ($act === "restore") {
                    Page::withTrashed()
                        ->whereIn('id', $list_check)
                        ->restore();
                    return redirect('admin/page/list')->with('status', 'Bạn đã khôi phục thành công');
                }
                if ($act === "forceDelete") {
                    Page::withTrashed()
                        ->whereIn('id', $list_check)
                        ->forceDelete();
                    return redirect('admin/page/list')->with('status', 'Bạn đã xóa vĩnh viễn thành công');
                }
                return redirect('admin/page/list')->with('status', 'Bạn có quyền thao tác chức năng này !');
            } else {
                return redirect('admin/page/list')->with('status', 'Bạn cần chọn phần tử thực hiện !');
            }
        }
}
