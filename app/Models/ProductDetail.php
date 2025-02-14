<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductDetail extends Model
{
    use HasFactory;

    protected $fillable=[
        'product_id', 'brand', 'size', 'color', 'material', 'expiry_date',

    ];

    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}
