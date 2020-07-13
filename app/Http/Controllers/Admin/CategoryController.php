<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Category;


class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::orderBy('name')->paginate(10);
        return view('admin.categories.index')->with(compact('categories')); //listado
    }

    public function create()
    {
    	return view('admin.categories.create'); // formulario
    }


    public function store(Request $request)
    {
    	//validar
    	$this->validate($request, Category::$rules, Category::$messages);

        // registrar nueva categoría en BD
        Category::create($request->all()); // mass assignment
        
        return redirect('/admin/categories');
    }

        public function edit(Category $category)
    {
        
        
        return view('admin.categories.edit')->with(compact('category')); // formulario
    }


        public function update(Request $request, Category $category)
    {
  
        $this->validate($request, Category::$rules, Category::$messages);
        // edita producto en BD
        // dd($request->all() ); imprime los valores para verificar
        $category->update($request->all());
 
        return redirect('/admin/categories');
    }

        public function destroy(Category $category)
    {
        // eliminiar producto en BD
        
        $category->delete(); //Elimina un registro

        return back();
    }    
 
}
