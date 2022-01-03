<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SellerLoginController extends Controller
{
    public function store(Request $request) {
        
        $this->validate($request,[
            'email' =>'required|email|max:255',
            'password' =>'required',
        ]);
        
        if(!Auth::guard('seller')->attempt($request->only('email','password'),$request->remember)){
            return back()->with('status','Invalid Login Credentials');
        }

        return redirect()->route('sellerdashboard');       
    }
}
