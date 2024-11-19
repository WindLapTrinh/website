<?php

namespace App\Http\Controllers;

use App\Mail\OrderStatusUpdated;
use App\Models\AdminNotification;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'address' => ['required', 'string'],
            'phone_number' => ['required', 'string'],
            'payment_method' => ['required', 'string'],
        ]);

        $customer = Customer::create([
            'fullname' => $request->input('fullname'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'status' => 'potential',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Giỏ hàng của bạn đang trống');
        }

        $product_quantity = count($cart);
        $total_amount = array_reduce($cart, function ($total, $item) {
            return $total + ($item['price'] * $item['quantity']);
        }, 0);

        $order = Order::create([
            'product_quantity' => $product_quantity,
            'total_amount' => $total_amount,
            'order_date' => now(),
            'payment_method' => $request->input('payment_method'),
            'shipping_address' => $customer->address,
            'status' => 'processing',
            'customer_id' => $customer->id,
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
            ]);
        }

        AdminNotification::create([
            'title' => $customer->fullname . ' ' . 'vừa đặt hàng',
            'message' => 'Mã đơn hàng #' . $order->id . ',' . 'tổng đơn hàng:' . $order->total_amount,
            'order_id' => $order->id,
            'is_read' => false,
        ]);

        session()->forget('cart');

        return redirect("/")->with('success', 'Đơn hàng của bạn đã được đặt thành công!');
    }

    public function list(Request $request)
    {
        $query = Order::with(['customer', 'products']);

        // Lọc theo trạng thái nếu có yêu cầu
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $orders = $query->get();

        // Đếm số lượng đơn hàng theo trạng thái
        $counts = [
            'processing' => Order::where('status', 'processing')->count(),
            'delivered' => Order::where('status', 'delivered')->count(),
            'canceled' => Order::where('status', 'canceled')->count(),
        ];

        return view('admin.cart.list-order', compact('orders', 'counts'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'fullname' => ['required'],
            'phone_number' => ['required'],
            'address' => ['required'],
            'status' => ['required']
        ]);

        $order = Order::find($request->order_id);
        $oldStatus = $order->status;  // Lưu trạng thái cũ

        // Cập nhật thông tin khách hàng
        $order->customer->fullname = $request->fullname;
        $order->customer->phone_number = $request->phone_number;
        $order->customer->address = $request->address;

        // Cập nhật trạng thái
        $order->status = $request->status;

        // Kiểm tra xem trạng thái có thay đổi hay không
        if ($oldStatus != $request->status) {
            // Gửi email thông báo nếu trạng thái thay đổi
            Mail::to($order->customer->email)->send(new OrderStatusUpdated($order));
        }

        // Lưu thông tin
        $order->push();

        return redirect()->route('order.list')->with('status', 'Cập nhật thông tin đơn hàng thành công');
    }
}
