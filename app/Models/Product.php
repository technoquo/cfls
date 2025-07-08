<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'sub_category_id',
        'description',
        'price',
        'choix',
        'stock',
        'image',
        'video',
        'weight',
        'status',
    ];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function images(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function mainImage() : \Illuminate\Database\Eloquent\Relations\HasOne
    {
        // Si tienes una sola imagen principal, o simplemente una imagen
        return $this->hasOne(ProductImage::class);
    }

    public function orders(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'product_orders')
            ->withPivot('quantity', 'choix', 'price')
            ->withTimestamps();
    }

    public function options(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductOption::class);
    }
}
