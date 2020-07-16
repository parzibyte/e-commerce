<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ["category_id", "name", "description", "price", "stock",
    ];

    public function pictures()
    {
        return $this->hasMany(ProductPicture::class, "product_id");
    }

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }

}
