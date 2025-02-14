<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShippingAddress extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'address',
        'city',
        'postal_code',
        'country',
        'phone',

    ];
}
