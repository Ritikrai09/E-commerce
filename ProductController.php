<?php

namespace App\Http\Controllers;
use  App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
 
    public function store(Request $request) {

        $validate = Validator::make($request->all(),[
            'productName' =>'required|max:255',
            'quantity' =>'required',
            'weight' =>'required',
            'boxes' =>'required',
            'MRP' =>'required',
            'costprice' =>'required',
            'image' =>'required|image|mimes:png,jpeg,jpg,gif,svg|max:2048',
            'productDescription' =>'required',
        ]);
            $product = new Product;
            $product->productName = $request->productName;
            $product->quantity = $request->quantity;
            $product->weight = $request->weight;
            $product->boxes = $request->boxes;
            $product->MRP = $request->MRP;
            $product->costprice = $request->costprice;
            $product->productDescription = $request->productDescription;
            $product->seller_id = $request->user('seller')->id;
            $product->category_id = $request->category;
            if ($request->hasFile('image')) {
            $image= time().'.'.$request->image->getClientOriginalName();
            $image = $request->file('image')->store('/images');
            $product->image = $image;
            }
          
   
           if (!$validate->fails()) {
            $product->save();
          }else {
            return back()->with('failed','Input field is missing')->withErrors($validate)->withInput($request->except('password'));
          }
    //    auth()->attempt($request->only('email','password')); // we will get array of values
        return redirect()->route('products')->with('success','Product stocked Successfully...');  //redirect()->back()->with('success','your are registered successfully...');
    }
}
