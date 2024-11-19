<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function getAllProducts()
    {
        $products = Product::all(); // Lấy tất cả sản phẩm từ database

        return response()->json([
            'status' => 'success',
            'data' => $products,
        ], 200);
    }
}
