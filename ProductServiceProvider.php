<?php

namespace App\Providers;
use App\Models\Product;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
  
        public function boot()
        {
            view()->composer('*',function($view) {
               $view->with('product',Product::all());
            
        });
    
    }
}
    