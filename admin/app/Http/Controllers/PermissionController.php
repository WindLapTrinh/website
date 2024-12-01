<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //
    function list(){
        
        return view('admin.permission.list');
    }

    function add(Request $request){
        
    }
}
