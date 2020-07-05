<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Relaciones $products->category
    public Function category()
    {
    	return $this->belongsto(Category::class);
    }

    // $product->images
    public Function images()
    {
    	return $this->hasMany(ProductImage::class);
    }

    public Function getfeaturedImageUrlAttribute()
    {
        $featuredImage = $this->images()->where('featured', true)->first();
        if(!$featuredImage)
            $featuredImage = $this->images()->first();

        if($featuredImage) {
            return $featuredImage->url;
        }

        // imagen por dafault
        return '/images/products/default.png';
    }
}
