<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductOffer extends Model
{
    use HasFactory;
    protected $table = 'product_offers';


     protected $fillable = [
         'product_id',
         'offer_name',
         'discount',
         'start_date',
         'end_date',
         'status',
     ];
     protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];


     // Relationship with Product
     public function product(): BelongsTo
     {
         return $this->belongsTo(Product::class);
     }
 }


