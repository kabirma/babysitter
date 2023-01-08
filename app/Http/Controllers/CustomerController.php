<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Facades\Hash;
use Session;
use DB;
use Auth;

class CustomerController extends Controller
{
    public function index($type = 1)
    {
        $title = $type == 1 ? "Offer" : "Supplier";
        $customers = Customer::where('type', $type)->get();
        return view("customer.index", compact("customers", "title", "type"));
    }

    public function add()
    {
        $title = "Customers";
        return view("customer.add", compact("title"));
    }

    public function edit($id)
    {
        $title = "Customers";
        $customers = Customer::find($id);
        return view("customer.add", compact("title", "customers"));
    }

    public function create(Request $request)
    {
        $customer = new Customer;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->password = Hash::make($request->password);
        $customer->pin = $request->password;
        $customer->address = $request->address;
        $customer->country = $request->country;
        $customer->status = "active";

        if ($customer->save()) {
            return redirect()->back()->with("success", "Created Successfully");
        }
    }

    public function update(Request $request)
    {
        $customer = Customer::find($request->id);
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->password = Hash::make($request->password);
        $customer->pin = $request->password;
        $customer->address = $request->address;
        $customer->country = $request->country;
        $customer->status = $request->status;

        if ($customer->save()) {
            return redirect()->back()->with("success", "Updated Successfully");
        }
    }

    public function delete($id)
    {
        DB::delete("delete from customers where id='$id'");
        return redirect()->back()->with("success", "Deleted Successfully");
    }

    public function status($id, $status)
    {

        DB::delete("update customers set status='$status' where id='$id'");
        return redirect()->back()->with("success", "Status Updated Successfully");
    }
}
