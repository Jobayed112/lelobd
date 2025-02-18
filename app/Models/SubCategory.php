<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'sub_categories';

     protected $fillable=[
         'category_id',
         'name',
         'img_url',
     ];

     public function category():BelongsTo  {
         return $this->belongsTo(Category::class);
     }
     public function products(): HasMany
     {
         return $this->hasMany(Product::class);
     }
 }
 