<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
            'productName',
            'quantity',
            'weight',
            'boxes',
            'MRP',
            'costprice',
            'productDescription',
            'seller_id',
            'category_id'
    ];

    public function customers()
    {
       return $this->belongsTo(Customer::class);
    }

    public function sellers()
    {
       return $this->belongsTo(Seller::class);
    }

    public function categories()
    {
       return $this->belongsTo(Category::class);
    }


    public function index() {

        $posts = Post::with(['user','likes'])->paginate(20);   // using simplePaginate for next and previous links 
   
         return view('layouts.post',[
             'posts' => $posts
         ]);
       }
}
