<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'offer_name',
        'discount',
        'start_date',
        'end_date',
        'status',
    ];

    // Relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
