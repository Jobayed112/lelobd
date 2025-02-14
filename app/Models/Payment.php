<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'order_id',
        'invoice_id',
        'amount',
        'payment_method',
        'status',
        'transaction_id',
        'payment_date',
    ];
}
