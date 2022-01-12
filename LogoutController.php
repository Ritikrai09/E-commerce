<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store() {
     
        auth()->logout();
        
        return redirect()->route('home');
    }

    public function logoutSeller() {
     
        Auth::guard('seller')->logout();
        
        return redirect()->route('sellerlogin');
    }
     //
}
