@extends('layouts.app')

@section('title', 'Bienvenido a App Shop')

@section('body-class', 'profile-page sidebar-collapse') <!--landing-page sidebar-collapse dudas-->

@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}'); background-size: cover; background-position: top center;">
<!--url('assets/img/profile_city.jpg')">-->
 </div>

<div class="main main-raised">
    <div class="container">
  
      <div class="section">
        <h2 class="title text-center">Editar producto seleccionado</h2>
        
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif>

        <form method="post" action="{{ url('/admin/products/'.$product->id.'/edit') }}">
            {{ csrf_field() }}

            <div class="row">
              <div class="col-sm-6">
                  <div class="form-group bmd-form-group">
                    <label class="control-label">Nombre del producto</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}">
                  </div>
              </div>

               <div class="col-sm-6">
                  <div class="form-group label-floating"><!-- bmd-form-group-->
                        <label class="control-label">Precio del producto</label>
                        <input type="number" step="0.01" class="form-control" name="price" value="{{ old('name', $product->price) }}">
                  </div>
              </div>
            </div>
                  
          
             <div class="row">
              <div class="form-group label-floating col-md-6">
              <label class="control-label">Descripción corta</label>
              <input type="text" class="form-control" name="description" value="{{ old('descrption', $product->description) }}">
            </div>
                
                <div class="form-group label-floating  col-md-6">
                  <label class="control-label">Categoría del producto</label>
                  <select class="custom-select" name="category_id">
                    <option value="0">General</option>
                    @foreach ( $categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == old('category_id', $product->category_id)) selected @endif>{{ $category->name }}
                    </option>
                    @endforeach                  
                  </select>
                </div>
              </div>

        
            <textarea class="form-control" placeholder="Descripción extensa del producto" rows="5" name="long_description">{{ old('long_description', $product->long_description) }}</textarea>

            <button class="btn btn-primary">Guardar cambios</button>
            <a href="{{ url('/admin/products')}}" class="btn btn-default">Cancelar</a>

        </form>

      </div>
   </div>
  </div>

@include('includes.footer')

@endsection