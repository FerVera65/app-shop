@extends('layouts.app')

@section('title', 'Resultados de búsqueda')

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
            <img src="/img/search.jpg" alt="Imagen de una lupa que representa la pagina de resultados" class="img-raised rounded-circle img-fluid">
          </div>

          <div class="name">
            <h3 class="title">Resultados de búsqueda</h3>
    
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
      <p>Se encontraron {{ $products->count() }} resultados para el término {{ $query }}</p>
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
  

@include('includes.footer')

@endsection


