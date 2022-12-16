<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name',
        'brand_id',
        'category_id',
        'slug',
        'primary_image',
        'description',
        'status',
        'price',
        'is_active',
        'delivery_amount',
        'delivery_amount_per_product',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    public function getIsActiveAttribute($isActive)
    {
        return $isActive ? 'فعال' : 'غیرفعال';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'product_tag');
    }
    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }
    public function variations()
    {
        return $this->hasMany(ProductVariation::class);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
