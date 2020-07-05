<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    //
	public function show($id)
	{
		$product =Product::find($id);
		$images = $product->images;

		$images1 = collect();
		$images2 = collect();
		foreach ($images as $key => $image) {
			if ($key%2==0)
				$images1->push($image);
			else
				$images2->push($image);
		}
		
		return view ('products.show')->with(compact('product', 'images1', 'images2'));//"Mostrar producto $id";	
	}
    
}
