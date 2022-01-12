<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoryName',
        'description',
        'seller_id',
    ];

  
  public function seller() {    
     return $this->belongsTo(Seller::class); 
   }

     
  public function products() {    
    return $this->hasMany(Product::class); 
  }

  public function productsInCategory() {    
    return $this->hasManyThrough(Product::class,Seller::class); 
  }

}
