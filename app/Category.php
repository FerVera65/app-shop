<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
        public static $messages =[
	        'name.required'=> 'Es necesario ingresar nombre de producto.',
	        'name.min' => 'El nombre debe contener al menos 3 caracteres.',
	        'descrption.max' => 'Debe contener máximo 200 caracteres',
        ];

        public static $rules = [
           'name'=>'required|min:3',
           'description'=>'max:200',

        ];
    protected $fillable = ['name', 'description'];

    // Relaciones $category->products
    public Function products()
    {
    	return $this->hasMany(Product::class);
    }

    public Function getFeaturedImageUrlAttribute()
    {
        $feacturedProduct = $this->products()->first();
        return $feacturedProduct->featured_image_url;
    }
}
