<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'category_id',
        'image_path',
        'is_active',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
