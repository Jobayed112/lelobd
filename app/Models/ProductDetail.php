<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductDetail extends Model
{
    use HasFactory;
    protected $table = 'product_details';

    protected $fillable=[
        'product_id', 'brand', 'size', 'color', 'material','description'

    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}
