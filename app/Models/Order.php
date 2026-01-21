<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    protected $fillable = [
        'delivery',
        'member_discount',
        'total',
        'delivery_fee',
        'order_status',

    ];
    protected $casts = [
        'address' => 'array',
        'livraison' => 'boolean',
    ];
    public function products(): belongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_orders')
            ->withPivot('quantity', 'choix', 'price')
            ->withTimestamps();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function productOrders()
    {
        return $this->hasMany(ProductOrder::class);
    }

}
