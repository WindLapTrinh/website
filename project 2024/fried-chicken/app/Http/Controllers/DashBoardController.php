<?php

namespace App\Http\Controllers;

use App\Models\AdminNotification;
use App\Models\Order;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    //
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['model_active' => 'dashboard']);

            return $next($request);
        });
    }
    public function show()
    {
        // Get orders with their customer and products relationships
        $orders = Order::with(['customer', 'products'])
            ->whereIn('status', ['processing', 'canceled', 'delivered'])
            ->get();

        // Calculate total revenue (sum of total_amount from all orders)
        $totalRevenue = $orders->where('status', 'delivered')->sum('total_amount');

        return view("admin.dashboard", compact('orders', 'totalRevenue'));
    }
}
