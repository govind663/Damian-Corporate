<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'product_id',
        'citizen_id',
        'cart_id',
        'order_number',
        'order_status',
        'order_date',
        'order_total_price',
        'payment_method',
        'payment_status',
        'payment_transaction_id',
        'payment_date',
        'inserted_by',
        'inserted_at',
        'modified_by',
        'modified_at',
        'deleted_by',
        'deleted_at',
    ];

    protected $dates = [
        'inserted_at',
        'modified_at',
        'deleted_at',
    ];

    // === Relations with Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    // === Relations with Citizen
    public function citizen()
    {
        return $this->belongsTo(Citizen::class, 'citizen_id', 'id');
    }

    // === Relations with Cart
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id', 'id');
    }

}
