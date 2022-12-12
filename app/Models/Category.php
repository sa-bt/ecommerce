<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        "name",
        "slug",
        "parent_id",
        "description",
        "is_active",
        "icon",
    ];

    public function getIsActiveAttribute($isActive)
    {
        return $isActive ? 'فعال' : 'غیرفعال';
    }

    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class,'parent_id');
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class,'attribute_category');
    }
}
