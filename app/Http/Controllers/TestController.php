<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;

class TestController extends Controller
{
    public function welcome()
    {
		$products = Product::paginate(9); //::all()
		return view('welcome')->with(compact('products'));
    }
}
