<?php

namespace App\Http\Controllers;
use  App\Models\Category;
use  App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    
    public function index(Request $request) {
        $category = Category::where('seller_id', $request->user('seller')->id)->get();     
    return view('layouts.ecommerce.category',compact('category','category'));
  
    }


    public function store(Request $request) {
     
    $validate = Validator::make($request->all(),[
            'categoryName' =>'required|max:255',
            'description' =>'required',
        ]);

    Category::create([
        'categoryName' => $request->categoryName,
        'description' => $request->Description,
        'seller_id'=> $request->user('seller')->id
    ]);

    
    if (!$validate->fails()) {
        return back()->with('failed','Input field is missing');
    }else{
      return back()->with('success','Category Added');
    }
  
  }
}
