<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'product_id',
        'product_title',
        'product_price',
        'product_quantity',
        'product_size',
        'product_custom',
        'status',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
