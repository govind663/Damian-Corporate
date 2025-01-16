<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'product_category_id',
        'product_sub_category_id',
        'product_colors_id',
        'product_sku',
        'name',
        'slug',
        'description',
        'image',
        'product_other_images',
        'price',
        'discount_type',
        'discount_price_in_percentage',
        'discount_price_after_percentage',
        'discount_price_in_amount',
        'discount_price_after_ammount',
        'height',
        'width',
        'depth',
        'seat_height',
        'product_type',
        'status',
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

    // === Relations with ProductCategory
    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    // === Relations with ProductSubCategory
    public function product_sub_category()
    {
        return $this->belongsTo(ProductSubCategory::class);
    }

    // === Relations with ProductColors
    public function product_colors()
    {
        return $this->belongsTo(ProductColors::class);
    }
}
