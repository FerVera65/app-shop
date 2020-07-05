@extends('layouts.app')

@section('title', 'Listado de productos')

@section('body-class','profile-page sidebar-collapse') <!--landing-page sidebar-collapse  'profile-page'-->

@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}'); background-size: cover; background-position: top center;">
<!--url('assets/img/profile_city.jpg')">-->
</div>

<div class="main main-raised">
  <div class="container">
    <div class="section text-center">
      <h2 class="title">Listado de productos</h2>
      
      <div class="team">
         
       <a href="{{ url('/admin/products/create') }}" class="btn btn-primary btn-round">Nuevo producto</a>

         <div class="row"> 
          <div class="col-md-12">

          <table class="table table-striped"> <!-- table-sm  -->
              <thead> <!-- class="thead-light" -->
                  <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Nombre</th>
                      <th class="text-center">Descripción</th>
                      <th class="text-center">Categoría</th>
                      <th class="text-right ">Precio</th>
                      <th class="text-center">Opciones</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                  
                  <tr>
                      <td class="text-center">{{$product->id}}</td>
                      <td>{{$product->name}}</td>
                      <td class="">{{$product->description}}</td> <!--description-->
                      <td >{{$product->category ? $product->category->name : 'General'}}</td>
                      <td class="text-right">&#36; {{$product->price}}</td>
                      <td class="td-actions text-right" >
                                                   
                          <form method="post" action="{{ url('/admin/products/'.$product->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a type="button" rel="tooltip" title="Ver producto" class="btn btn-info btn-link btn-sm">
                            <i class="fa fa-info"></i>
                            </a>
                            <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar producto" class="btn btn-success btn-link btn-sm">  <!-- btn btn-success btn-simple btn-link -->
                                <i class="fa fa-edit"></i>
                            </a>
                            
                            <a href="{{ url('/admin/products/' .$product->id. '/images') }}" rel="tooltip" title="Imagenes del producto" class="btn btn-warning btn-link btn-sm">
                                <i class="fa fa-image"></i>
                            </a>


                            <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm">
                                 <i class="fa fa-times-circle"></i>
                            </button>      
                          </form>
                      </td>
                  </tr>
                @endforeach
              </tbody>
          </table>

          {{ $products->links() }}
        </div>
      </div>
      
      
      </div>

    </div>
  </div>
</div> 

@include('includes.footer')

@endsection