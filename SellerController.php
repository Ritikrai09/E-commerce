<?php

namespace App\Http\Controllers;
use App\Models\Seller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SellerController extends Controller
{

    public function index(Seller $seller,Request $request) {
      
      $seller = $seller->withCount(['products','categories'])->where('id', $request->user('seller')->id)->get();
      return view('layouts.ecommerce.selldash',compact('seller','seller'));
    

    //  $seller = Seller::with(['customers'])->get();  
      // return view('layouts.seller', compact('seller'));
       
    }

}
