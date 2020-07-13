@extends('layouts.app')

@section('title', 'Bienvenido a App Shop | Dashboard')

@section('body-class', 'profile-page sidebar-collapse') <!--landing-page sidebar-collapse dudas-->

@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('/img/city-profile.jpg');"></div>

<div class="main main-raised">
<div class="profile-content">
  <div class="container">
    <div class="row">
      <div class="col-md-6 ml-auto mr-auto">
        <div class="profile">
          <div class="avatar">
            <img src="{{ $category->featured_image_url}}" alt="Imagen representativa de la categoría {{ $category->name }}" class="img-raised rounded-circle img-fluid">
          </div>

          <div class="name">
            <h3 class="title">{{ $category->name }}</h3>
    
          </div>
            @if (session('notification'))
                <div class="alert alert-success" role="alert">
                    {{ session('notification') }}
                </div>
            @endif
        </div>
      </div>
    </div>
    <div class="description text-center">
      <p>{{ $category->description }} </p>
    </div>

    <div class="team">
      <div class="row">
        @foreach ($products as $product)

        <div class="col-md-4">
          <div class="team-player text-center">

            <div class="card card-plain">
              <div class="col-md-6 ml-auto mr-auto">
                <img src="{{ $product->featured_image_url }}" alt="Sin Imagen2" class="img-raised rounded-circle img-fluid"> <!-- $product->images()->first()  ? $product->images()->first()->image : 'vacio'  -->
              </div>
              <h4 class="card-title">
                <a href="{{ url('/products/'.$product->id) }}">{{ $product->name }}</a>
               
              </h4>
              <div class="card-body">
                <p class="card-description">{{ $product->description ? $product->description : 'S/d' }}</p>
              </div>

            
            </div>
          </div>
        </div>
        @endforeach
      </div>
        <div class="col-md-3 ml-auto mr-auto text-center">
          <div class="row">
          {{ $products->links ()}}
          </div>
        </div>        
    </div>

    </div>
  </div>
</div>
</div>
  

<!-- Modal -->
<div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seleccione la cantidad que desea agregar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ url('/cart') }}">
        {{ csrf_field() }}
        <input type="hidden" name="product_id" value="{{ $product->id }}">
          <div class="modal-body">
            <input type="number" name="quantity" value="1" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Añadir al carrito</button>
          </div>          
      </form>

    </div>
  </div>
</div>


@include('includes.footer')

@endsection


