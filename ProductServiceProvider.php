<?php

namespace App\Providers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
   
    public function boot()
    {   
        View::composer(['layouts.ecommerce.productAvailable','layouts.ecommerce.product','layouts.ecommerce.bill'],function($view) {
        $view->with('product', Category::where('seller_id', Auth::guard('seller')->user()->id)->with(['products'])->get());
  });
}
}
    