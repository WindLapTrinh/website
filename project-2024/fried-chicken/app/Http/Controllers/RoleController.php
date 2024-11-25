<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    //
    function getList(Request $request){
         
        $status = $request->input('status');
        $list_act = [
            'delete' => 'Xóa tạm thời'
        ];
        if($status == "trash"){
            $list_act = [
                'restore' => 'Khôi phục',
                'forceDelete' => 'Xóa vĩnh viễn'
            ];
            $roles = Role::onlyTrashed()->paginate(10);
        }else{
                $keyword = "";
                if($request->input('keyword')){
                    $keyword = $request->input('keyword');
                }
                $roles = Role::where('name', 'LIKE', "%{$keyword}%")->paginate(10);
        }
        $const_role_active = Role::count();
        $const_role_trash = Role::onlyTrashed()->count();

        $count = [$const_role_active, $const_role_trash];
        return view("admin.role.list", compact("roles", "list_act", "count", "request"));
    }

    function add(){
        $permissions = Permission::all()->groupBy(function($permissions){
            return explode(".", $permissions->slug)[0];
        });

        return view("admin.role.add", compact("permissions"));
    }
    function store(Request $request){
        // return $request->all();

        $request->validate([
            'name' => 'required|unique:roles,name',
            'description' => 'required',
        ]);

        $role = Role::create([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        $role->permissions()->attach($request->input('permission_id'));
        return redirect()->route('role.list')->with('status', 'Đã thêm vai trò thành công');
    }

    function edit(Role $role){
        $permissions = Permission::all()->groupBy(function($permission){
            return explode('.', $permission->slug)[0];
        });
        return view("admin.role.edit", compact('role', 'permissions'));
    }

    function update(Request $request, Role $role){
        $request->validate([
            'name' => 'required|unique:roles,name,'.$role->id,
            'permission_id' => 'nullable|array',
            'permission_id.*' => 'exists:permissions,id',
        ]);
        $role->update([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);
        $role->permissions()->sync($request->input('permission_id', []));

        return redirect()->route('role.list')->with('status', 'Đã cập nhập thông tin vai trò thành công');
    }

    function delete(Role $role){
        $role->delete();
        return redirect() -> route('role.list')->with('status', 'Vai trò đã xóa thành công');
    }
    function action(Request $request){
        $list_check = $request->input('list_check');
        if($list_check){
            foreach($list_check as $k => $id){
                $role = Role::find($id);
                if($role && auth()->id() == $role->$id){
                    unset($list_check[$k]);
                }
            }
        }
        if(!empty($list_check)){
            $act = $request->input('act');
            if($act === 'delete'){
                Role::destroy($list_check);
                return redirect()->route('role.list')->with('status', 'Bạn đã xóa thành công');
            }
            if($act === 'restore'){
                Role::withTrashed()
                 ->whereIn('id', $list_check)
                 ->restore();
                return redirect()->route('role.list')->with('status', 'Bạn đã khôi phục thành công');
            }
            if($act === 'forceDelete'){
                Role::withTrashed()
                    ->whereIn('id', $list_check)
                    ->forceDelete();
                return redirect()->route('role.list')->with('status', 'Bạn đã xóa vĩnh viễn thành công');
            }
        }else{
            return redirect()->route('role.list')->with('status', 'Bạn cần chọn phần tử thực hiện');
        }

    }
}
