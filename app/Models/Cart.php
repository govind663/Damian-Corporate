<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'citizen_id',
        'product_id',
        'quantity',
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

    // ==== Relationship between Citizen
    public function citizen()
    {
        return $this->belongsTo(Citizen::class, 'citizen_id', 'id');
    }

    // ==== Relationship between Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

}
