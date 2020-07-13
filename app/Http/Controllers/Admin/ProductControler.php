<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\Category;


class ProductControler extends Controller
{
    public function index()
    {
    	$products = Product::paginate(10);
        return view('admin.products.index')->with(compact('products')); //listado
    }

    public function create()
    {
    	$categories = Category::orderBy('name')->get();
        return view('admin.products.create')->with(compact('categories')); // formulario
    }


    public function store(Request $request)
    {
    	//validar
        $messages =[
            'name.required'=> 'Es necesario ingresar nombre de producto.',
            'name.min'=> 'El nombre debe contener al menos 3 caracteres.',
            'descrption.required'=> 'Es necesario ingresar la descripción del producto.',
            'descrption.max' => 'Debe contener máximo 200 caracteres',
            'price.required' => 'Es necesario definir el precio del producto.',
            'price.numeric' => 'Ingrese un precio válido.',
            'price.min' => 'No se admiten valores negativos'
        ];

        $rules =[
           'name'=>'required|min:3',
           'description'=>'required|max:200',
           'price'=>'required|numeric|min:0'
        ];

        $this->validate($request, $rules);

        // registrar nuevo producto en BD
        // dd($request->all() ); imprime los valores para verificar
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id;    
        $product->save(); //inserta un registro

        return redirect('/admin/products');
    }

        public function edit($id)
    {
        //return "muestra el valor a cambiar del producto $id";
        $categories = Category::orderBy('name')->get();
        $product = Product::find($id);
        return view('admin.products.edit')->with(compact('product', 'categories')); // formulario
    }


        public function update(Request $request, $id)
    {
  
        $messages =[
            'name.required'=> 'Es necesario ingresar nombre de producto.',
            'name.min' => 'El nombre debe contener al menos 3 caracteres.',
            'descrption.required'=> 'Es necesario ingresar la descripción del producto.',
            'descrption.max' => 'Debe contener máximo 200 caracteres',
            'price.required' => 'Es necesario definir el precio del producto.',
            'price.numeric' => 'Ingrese un precio válido.',
            'price.min'=> 'No se admiten valores negativos'
        ];

        $rules = [
           'name'=>'required|min:3',
           'description'=>'required|max:200',
           'price'=>'required|numeric|min:0'
        ];

        $this->validate($request, $rules);

        // edita producto en BD
        // dd($request->all() ); imprime los valores para verificar
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id;
        $product->save(); //UPDATE
 
        return redirect('/admin/products');
    }

        public function destroy($id)
    {
        // eliminiar producto en BD
        $product =  Product::find($id);
        $product->delete(); //Elimina un registro

        return back();
    }    

}
