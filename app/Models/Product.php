<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
protected $fillable=[
    'category_id',
    'name',
    'description',
    'quantity',
    'price',
    'img_url',
    'stock',

];
    public function category() : BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function productDetail() : HasOne {
        return $this->hasOne(ProductDetail::class);
    }
    public function offers()
    {
    return $this->hasMany(ProductOffer::class);
    }

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function orderItem(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function productReview(): HasMany
    {
        return $this->hasMany(ProductReview::class);
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }

}
