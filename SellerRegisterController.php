<?php

namespace App\Http\Controllers;
use App\Models\Seller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class SellerRegisterController extends Controller
{
    public function __construct() {
        $this->middleware(['guest'])->except('logout');
    }
    public function store(Request $request) {

          $this->validate($request,[
                'SellerName' =>'required|max:255',
                'CompanyName' =>'required|max:255',
                'email' =>'required|email|max:255',
                'password' =>['required', 'string', 'min:8', 'confirmed'],
                'contact' =>'required|digits:10',
                'officeAddress' =>'required',
                'city' =>'required',
                'state' =>'required',
          ]);

          Seller::create([
            'SellerName' =>$request->SellerName,
            'CompanyName' =>$request->CompanyName,
            'email' =>$request->email,
            'password' =>Hash::make($request->password),
            'contact' =>$request->contact,
            'officeAddress' =>$request->officeAddress,
            'city' =>$request->city,
            'state' =>$request->state,
        ]);
       
         if(Auth::guard('seller')->attempt($request->only('email','password'))){
        return redirect()->route('sellerdashboard')->with('success','your are registered successfully...');
       }
    }
            // we will get array of values
            //redirect()->back()->with('success','your are registered successfully...');

}
