<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //

    function list(){
        return view('admin.customer.list');
    }
}
