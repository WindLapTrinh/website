<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    public function add(Request $request, $id)
    {

        $product = Product::find($id);
        //  return dd($product);

        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm này không tồn tại');
        }

        $cart = session()->get('cart', []);

        // return dd($cart);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "product_id" => $product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->images->first()->url
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng');
    }

    public function home()
    {
        //data cart
        $cart = session()->get('cart', []);

        //total cart
        $totalPrice = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $cartItems = session()->get('cart', []);
        return view('cart.home', compact('cart', 'cartItems', 'totalPrice'));
    }

    public function checkout()
    {
        //data cart
        $cart = session()->get('cart', []);

        //total cart
        $totalPrice = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $cartItems = session()->get('cart', []);
        return view('cart.checkout', compact('cart', 'cartItems', 'totalPrice'));
    }

    public  function update(Request $request)
    {
        // return dd($request);
        $cart = Session::get('cart', []);
        foreach ($request->items as $productId => $quantity) {
            if (isset($cart[$productId])) {
                if ($quantity > 0) {
                    $cart[$productId]['quantity'] = $quantity;
                } else {
                    unset($cart[$productId]);
                }
            }
        }
        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Giỏ hàng đã được cập nhập thông tin thành công');
    }

    public function delete(Request $request){

        $cart = Session::get('cart', []);

        $productId = $request->product_id;
        if(isset($cart[$productId])){
            unset($cart[$productId]);
            Session::put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Bạn đã xóa sản phẩm ra khỏi giỏ hàng thành công');
    }

    public function clear(){

        Session::forget('cart');
        return redirect()->back()->with('success', 'Giỏ hàng đã được xoá !');
    }
}
