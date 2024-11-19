<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderItemContrller extends Controller
{
    //
    protected $table = 'order_items';
    
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity'
    ];
}
