<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

class Seller extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'CompanyName',
        'SellerName',
        'contact',
        'FlatNo',
        'officeAddress',
        'state',
        'email',
        'password',
        'city',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    public function user() {  

      return Seller::where('id', Auth::guard('seller')->user()->id); 
    
    }
    

    public function productsAvailiable() {    
        return $this->hasManyThrough(Product::class,Seller::class); 
      }
    
      public function categories() {    
        return $this->hasMany(Category::class); 
      }
     

    public function customers()
    {
       return $this->hasMany(Customer::class);
    }

    public function products()
    {
       return $this->hasMany(Product::class);
    }

}
