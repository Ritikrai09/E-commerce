<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SellerController extends Controller
{
  public function __construct() {
    
    $this->middleware(['auth.seller']);

}
    public function index(Request $request) {
      

     return view('layouts.ecommerce.selldash');
    

    //  $seller = Seller::with(['customers'])->get();  
      // return view('layouts.seller', compact('seller'));
       
    }

}
