<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use Session;
use DB;

class AdminController extends Controller
{
    public function index()
    {
       $title="Admins";
       $admins=Admin::get();
       return view("admin.index",compact("admins","title"));
    }

    public function add()
    {
        $title="Admins";
      
        return view("admin.add",compact("title"));
    }

    public function edit($id)
    {
        $title="Admins";
        
        $admins=Admin::find($id);
        
        return view("admin.add",compact("title","admins"));
    }

    public function create(Request $request)
    {
        $admin=new Admin;
     
        $admin->username=$request->name;
        $admin->email=$request->email;
        $admin->role=$request->role;
        $admin->password=Hash::make($request->password);
        $admin->pin=$request->password;
        if($admin->save()){
            return redirect()->route('adminview')->with("success","Admin Created Successfully");

        }
       
    }

    public function update(Request $request)
    {
        $admin=Admin::find($request->id);
     
        $admin->username=$request->name;
        $admin->email=$request->email;
        $admin->role=$request->role;
        $admin->password=Hash::make($request->password);
        $admin->pin=$request->password;
        if($admin->save()){
            return redirect()->route('adminview')->with("success","Admin Updated Successfully");
        }
    }

    public function delete($id)
    {
        DB::delete("delete from admins where id='$id'");
        return redirect()->route('adminview')->with("success","Admin Deleted Successfully");
    }


}
