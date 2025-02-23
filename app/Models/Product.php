<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Category;
use App\Models\OrderItem;
use App\Models\SubCategory;
use App\Models\ProductImage;
use App\Models\ProductOffer;
use App\Models\ProductDetail;
use App\Models\ProductReview;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

protected $fillable = [
    'category_id',
    'sub_category_id',
    'name',
    'description',
    'quantity',
    'type',
    'price',
    'stock',
];


    public function category() : BelongsTo {
        return $this->belongsTo(Category::class);
    }
    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function productDetail() : HasOne {
        return $this->hasOne(ProductDetail::class);
    }
    public function offers()
    {
    return $this->hasMany(ProductOffer::class);
    }


    public function productReview(): HasMany
    {
        return $this->hasMany(ProductReview::class);
    }
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }




    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

       public function orderItems()
       {
           return $this->hasMany(OrderItem::class);
       }

       public function invoiceProducts()
       {
           return $this->hasMany(InvoiceProduct::class);
       }




}
