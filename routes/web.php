<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware;

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/search', 'SearchCotroller@show');
Route::get('/products/json', 'SearchCotroller@data');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}','ProductController@show');
Route::get('/categories/{category}','CategoryController@show');

Route::post('/cart', 'CartDetailController@store');
Route::delete('/cart', 'CartDetailController@destroy');

Route::post('/order', 'CartController@update');

Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function () {
        Route::get('/products','ProductControler@index'); // listado de productos edit
		Route::get('/products/create','ProductControler@create'); // Crear de productos Formulario
		Route::post('/products','ProductControler@store'); // Crear de productos grabar
		Route::get('/products/{id}/edit','ProductControler@edit'); // Editar productos Formulario
		Route::post('/products/{id}/edit','ProductControler@update'); // modificar de productos grabar
		Route::delete('/products/{id}','ProductControler@destroy'); // Eliminar productos Formulario

		Route::get('/products/{id}/images','ImageController@index'); // listar productos Formulario
		Route::post('/products/{id}/images','ImageController@store'); // registrar productos Formulario
		Route::delete('/products/{id}/images','ImageController@destroy'); // Eliminar productos Formulario
		Route::get('/products/{id}/images/select/{image}','ImageController@select'); // destacar imagen

		Route::get('/categories','CategoryController@index'); // listado de productos edit
		Route::get('/categories/create','CategoryController@create'); // Crear de productos Formulario
		Route::post('/categories','CategoryController@store'); // Crear de productos grabar
		Route::get('/categories/{category}/edit','CategoryController@edit'); // Editar productos Formulario
		
		Route::post('/categories/{category}/edit','CategoryController@update'); // modificar de productos grabar
		Route::delete('/categories/{category}','CategoryController@destroy'); // Eliminar productos Formulario

});

// Route::post('/admin/products/{id}/delete','ProductControler@destroy'); // Eliminar  productos Formulario 
//CR -UD