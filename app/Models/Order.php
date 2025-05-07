<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $casts = [
        'adresse' => 'array',
        'livraison' => 'boolean',
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_orders')
            ->withPivot('quantity', 'unit_price')
            ->withTimestamps();
    }
}
