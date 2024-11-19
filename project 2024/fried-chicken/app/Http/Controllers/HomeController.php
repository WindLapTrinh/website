<?php

namespace App\Http\Controllers;

use App\Models\CategoriesProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
        $products = Product::all();
        $featuredProducts = Product::where('is_featured', true)->get(); // Lấy sản phẩm nổi bật
        $categories = CategoriesProduct::with('children')->where('parent_id', 0)->get();
        $categoryByProducts = CategoriesProduct::whereHas('products')->with('products')->get();

        //get cart item
        $cartItems = session()->get('cart', []);
        $totalPrice = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cartItems));


        return view('template.home', compact('products', 'cartItems', 'totalPrice', 'featuredProducts', 'categories', 'categoryByProducts'));
    }

    public function showProductByCategory($slug)
    {

        $category = CategoriesProduct::where('slug', $slug)->firstOrFail();

        $categories = CategoriesProduct::with('children')->where('parent_id', 0)->get();

        $products = Product::with('images')->where('category_id', $category->id)->get();

        $cartItems = session()->get('cart', []);
        $totalPrice = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cartItems));

        $featuredProducts = Product::where('is_featured', true)->get(); // Lấy sản phẩm nổi bật
        $relateProducts = Product::get();

        return view('template.category-products', compact('category', 'relateProducts','featuredProducts', 'cartItems', 'totalPrice', 'products', 'categories'));
    }

    public function detailProduct($slug)
    {
        // Find product by slug
        $product = Product::where('slug', $slug)->firstOrFail();
    
        // Debug to confirm product is retrieved
        // return dd($product);
    
        // Additional code if needed
        $categories = CategoriesProduct::with('children')->where('parent_id', 0)->get();
        $relateProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->get();
        $cartItems = session()->get('cart', []);
        $totalPrice = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cartItems));
        $featuredProducts = Product::where('is_featured', true)->get();
    
        return view('template.detail-product', compact('product', 'featuredProducts', 'cartItems', 'totalPrice', 'relateProducts', 'categories'));
    }    

}
