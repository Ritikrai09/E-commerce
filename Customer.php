<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'contact',
        'flatNo',
        'Address',
        'state',
        'city',
        'seller_id',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    public function seller()
    {
       return $this->belongsTo(Seller::class);
    }

    public function orders()
    {
       return $this->hasMany(Customer::class);
    }
}
