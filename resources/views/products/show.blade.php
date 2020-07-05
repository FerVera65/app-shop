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
            <img src="{{ $product->featured_image_url}}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
          </div>

          <div class="name">
            <h3 class="title">{{ $product->name }}</h3>
            <h6>{{ $product->category ? $product->category->name : 'General' }}</h6>
            <!--<a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble"><i class="fa fa-dribbble"></i></a>
            <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter"><i class="fa fa-twitter"></i></a>
            <a href="#pablo" class="btn btn-just-icon btn-link btn-pinterest"><i class="fa fa-pinterest"></i></a> -->
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
      <p>{{ $product->long_description }} </p>
    </div>

    <div class="text-center">
        <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#modalAddToCart">
            <i class="material-icons">add</i> Añadir a carrito de compras
        </button>
    </div>




    <div class="row">
      <div class="col-md-6 ml-auto mr-auto">
        <div class="profile-tabs">
            <div class="nav-aling-center">

                <div class="tab-content tab-space"> <!-- tab-space --> 
                            <div class="tab-pane active" id="studio"> <!-- text-center gallery -->
                              <div class="row">
                                <div class="col-md-6"> <!-- mr-auto -->
                                @foreach ($images1 as $image)
                                    <img src="{{ $image->url }}" class="rounded">
                              </div>
                                @endforeach
                              <div class="col-md-6">
                                @foreach ($images2 as $image)
                                    <img src="{{ $image->url }}" class="rounded">
                              </div>
                                @endforeach
                            </div>
                        </div>
                  </div>

             </div>
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


