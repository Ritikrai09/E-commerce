<?php

namespace App\Providers;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer('*',function($view) {
           $view->with('category',Category::all());
        
    });

}
}
