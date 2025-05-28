<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'first_name',
        'second_name',
        'email',
        'telephone',
        'delivery',
        'total',
        'delivery_fee',
        'address',

    ];
    protected $casts = [
        'adresse' => 'array',
        'livraison' => 'boolean',
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_orders')
            ->withPivot('quantity', 'choix', 'unit_price')
            ->withTimestamps();
    }
}
