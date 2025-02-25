<?php

namespace App\Models;

use App\Models\User;


use App\Models\InvoiceProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoices';
    protected $fillable = [
        'user_id',
        'total',
        'vat',
        'payable',
        'cus_details',
        'ship_details',
        'tran_id',
        'val_id',
        'delivery_status',
        'payment_status',

    ];





    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function invoiceProducts(): HasMany
    {
        return $this->hasMany(InvoiceProduct::class, 'invoice_id');
    }
}
