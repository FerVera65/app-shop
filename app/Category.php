<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Relaciones $category->products
    public Function products()
    {
    	return $this->hasMany(Product::class);
    }
}
