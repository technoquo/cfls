<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
    public function products(): belongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_orders')
            ->withPivot('quantity', 'choix', 'price')
            ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
