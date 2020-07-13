<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\Category;

class TestController extends Controller
{
    public function welcome()
    {
		//$products = Product::paginate(9); //::all()
		//return view('welcome')->with(compact('products'));
		
		$categories = Category::has('products')->get(); //::all()
		return view('welcome')->with(compact('categories'));
    }
}
