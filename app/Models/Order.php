<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'delivery',
        'total',
        'delivery_fee',
        'order_status',

    ];
    protected $casts = [
        'address' => 'array',
        'livraison' => 'boolean',
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_orders')
            ->withPivot('quantity', 'choix', 'unit_price')
            ->withTimestamps();
    }
}
