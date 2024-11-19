<?php

namespace App\Http\Controllers;

use App\Models\AdminNotification;
use Illuminate\Http\Request;

class AdminNotificationController extends Controller
{
    //

    public function update($id){

        $notification = AdminNotification::find($id);
        $notification->is_read = true;

        $notification->save();

        return redirect()->route('order.list');
    }
}
