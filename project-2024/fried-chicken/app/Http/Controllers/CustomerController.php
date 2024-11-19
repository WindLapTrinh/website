<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //

    public function potential(Request $request)
    {
        $keyword = $request->input('keyword', '');
        // Lọc khách hàng tiềm năng
        $customers = Customer::where('fullname', 'LIKE', "%{$keyword}%")
            ->where('status', 'potential')
            ->paginate(10);

        return view('admin.customer.list-potential', compact('customers', 'request'));
    }

    public function purchased(Request $request)
    {
        $keyword = $request->input('keyword', '');
        // Lọc khách hàng đã mua hàng
        $customers = Customer::where('fullname', 'LIKE', "%{$keyword}%")
            ->where('status', 'purchased')
            ->paginate(10);

        return view('admin.customer.list-purchased', compact('customers', 'request'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'fullname' => ['required'],
            'phone_number' => ['required'],
            'address' => ['required'],
            'status' => ['required']
        ]);

        $customer = Customer::find($request->customer_id);


        if ($customer) {
            $customer->fullname = $request->fullname;
            $customer->phone_number = $request->phone_number;
            $customer->email = $request->email;
            $customer->address = $request->address;
            $customer->status = $request->status;

            $customer->save();

            $keyword = $request->input('keyword', '');
            $customers = Customer::where('fullname', 'LIKE', "%{$keyword}%")
                ->where('status', $customer->status)
                ->paginate(10);

            if ($customer->status == "potential") {
                return redirect()->route('customer.potential')
                    ->with('status', 'Cập nhật thông tin khách hàng thành công');
            } else {
                return redirect()->route('customer.purchased')
                    ->with('status', 'Cập nhật thông tin khách hàng thành công');
            }
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy khách hàng');
        }
    }


    public function contact(){

        return view('template.contact');
    }

    public function booking(){
        
    }
}
