<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
  use HasFactory;
  protected $fillable=[
    'user_id',
    'total',
    'discount',
    'vat',
    'total_amount',
    'status',
    'invoice_number',

  ];
}
