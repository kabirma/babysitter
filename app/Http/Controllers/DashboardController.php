<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DashboardController extends Controller
{
    public function Dashboard()
    {
       return view("dashboard");
    }
    
    public function login()
    {
        return view("login");
    }

    public function submitLogin(Request $request) {

        if ( Auth::guard('admin')->attempt(['email'=>$request->input('email'),
            'password'=>$request->input('password')])) {
            $admin = Auth::guard('admin')->user();

            return redirect()->route('dashboard');
        }
        else {
            return redirect()->route('login')
                ->with('error', 'Ooops! Invalid Email or Password')
                ->withInput();


        }
    }

    public function Adminlogout(Request $request) {

        Auth::guard('admin')->logout();

        return redirect()->route('login');

    }

}
