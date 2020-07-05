@extends('layouts.app')

@section('title', 'Bienvenido a App Shop | Dashboard')

@section('body-class', 'profile-page sidebar-collapse') <!--landing-page sidebar-collapse dudas-->

@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}'); background-size: contain; background-position: top center;">
<!--url('assets/img/profile_city.jpg')"> size: cover-->
</div>

<div class="main main-raised">
    <div class="container">
   
        <div class="section">               
            <h2 class="title text-center">Dashboard</h2>

                 @if (session('notification'))
                    <div class="alert alert-success" role="alert">
                        {{ session('notification') }}
                    </div>
                @endif

                <ul class="nav nav-pills nav-pills-icons" role="tablist">
                <!--
                color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
                -->
                    <li class="nav-item"> <!-- nav-item -->
                        <a class="nav-link active href="#dashboard-1" role="tab" data-toggle="tab" >
                            <i class="material-icons">dashboard</i>
                        Carrito de compras
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
                            <i class="material-icons">list</i>
                        Pedidos realizados
                        </a>
                    </li>
                </ul>
          <hr>   
          <p>Tu carrito de compras presenta {{ (auth()->user()->cart->details->count()) }} productos</p>   

          <table class="table table-striped">
              <thead> 
                  <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Nombre</th>
                      <th class="text-right">Precio</th>
                      <th class="text-right">Cantidad</th>
                      <th class="text-right ">Subtotal</th>
                      <th class="text-center">Opciones</th>
                  </tr>
              </thead>
              <tbody>
                @foreach (auth()->user()->cart->details as $detail)
                  <tr>
                      <td class="text-center">
                        <img src="{{ $detail->product->featured_image_url}}" height="60">
                    </td>
                      <td>
                        <a href="{{ url('/admin/products/'.$detail->product->id) }}" target="_blank">{{$detail->product->name}}</a>
                    </td>
                      
                      <td class="text-right">&#36; {{ $detail->product->price }}</td>
                      <td class="td-actions text-right">{{ $detail->quantity }}</td>
                        <td class="text-right">${{ $detail->quantity * $detail->product->price }}</td>

                        <td class="text-center">
                          <form method="post" action="{{ url('/cart') }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">
                            
                            <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank" rel="tooltip" title="Ver producto" class="btn btn-info btn-link btn-sm">
                            <i class="fa fa-info"></i>
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

            <div class="text-center"></dir>
                <form method="post" action="{{ url('/order') }}">
                    {{ csrf_field() }}

                    <button class="btn btn-primary btn-round">
                      <i class="material-icons">done</i> Realizar pedido
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
  
@include('includes.footer')

@endsection


