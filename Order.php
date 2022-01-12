<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'tax',
        'discount',
        'total',
        'status',
        'customer_id',
    ];

    const CREATED_AT ='order_at';
    const UPDATED_AT ='payment_at';

    public function orders()
    {
       return $this->belongsTo(Customer::class);
    }
    
}
