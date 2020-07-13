@extends('layouts.app')

@section('title', 'Bienvenido a ' . config('app.name'))

@section('body-class', 'landing-page') <!--landing-page sidebar-collapse -->

@section('styles')
  <style >
    .team .row .col-4{
      margin-bottom: 5em;
    }
    .team .row {
      display: -webkit-box;
      display: -webkit-flex;
      display: -ms-flexbox;
      display:  flex;
      flex-wrap: wrap;
    }
     .team .row->[class*='col-'] {
        display:  flex;
        flex-direction: column;
      }
    .form-inline {
      display: block;
      flex-flow: row wrap;
      align-items: center;
}
 
  .tt-query, /* UPDATE: newer versions use tt-input instead of tt-query */
  .tt-hint {
      width: 396px;
      height: 30px;
      padding: 8px 12px;
      font-size: 24px;
      line-height: 30px;
      border: 2px solid #ccc;
      border-radius: 8px;
      outline: none;
  }

  .tt-query { /* UPDATE: newer versions use tt-input instead of tt-query */
      box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  }

  .tt-hint {
      color: #999;
  }

  .tt-menu { /* UPDATE: newer versions use tt-menu instead of tt-dropdown-menu */
      width: 422px;
      margin-top: 12px;
      padding: 8px 0;
      background-color: #fff;
      border: 1px solid #ccc;
      border: 1px solid rgba(0, 0, 0, 0.2);
      border-radius: 8px;
      box-shadow: 0 5px 10px rgba(0,0,0,.2);
  }

  .tt-suggestion {
      padding: 3px 20px;
      font-size: 18px;
      line-height: 24px;
  }

  .tt-suggestion.tt-is-under-cursor { /* UPDATE: newer versions use .tt-suggestion.tt-cursor */
      color: #fff;
      background-color: #0097cf;

  }

  .tt-suggestion p {
      margin: 0;
  }

</style>
    
@endsection

@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}'); background-size: cover; background-position: top center;">

  <div class="container">
    <div class="row">
      <div class="col-md-6">
          <h1 class="title">Bienvenido a {{ config('app.name') }}</h1>
          <h4>Realiza tus pedidos en linea y te contactaremos para coordinar la entrega.</h4>
          <br>
          <a href="#" target="_blank" class="btn btn-danger btn-raised btn-lg">
            <i class="fa fa-play"></i> ¿Cómo funciona?
          </a>
      </div>
    </div>
  </div>
</div>

<div class="main main-raised">
  <div class="container">
    <div class="section text-center">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <h2 class="title">¿Por qué App Shop</h2>
          <h5 class="description">Puedes revisar nuestra relación completa de productos, comparar precios y realizar tus pedidos cuando estés seguro.</h5>
        </div>
    </div>
    <div class="features">
      <div class="row">
        <div class="col-md-4">
          <div class="info">
            <div class="icon icon-info">
              <i class="material-icons">chat</i>
            </div>
            <h4 class="info-title">Atendemos tus dudas</h4>
            <p>Atendemos rápidamente cualquier consulta que tengas vía chat. No estas sólo, sino que siempre estamos atentos de tus inquietudes </p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="info">
            <div class="icon icon-success">
              <i class="material-icons">verified_user</i>
            </div>
            <h4 class="info-title">Pago seguro</h4>
            <p>Todo pedido que realices será confirmado a través de una llamada. Si no confías en los pagos en línea puedes pagar contra entrega el valor acordado.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="info">
            <div class="icon icon-danger">
              <i class="material-icons">fingerprint</i>
            </div>
            <h4 class="info-title">Información privada</h4>
            <p>Los pedidos que realices sólo los conocerás tu a través de tu panel de usuario. Nadie más tiene acceso a esta información.</p>
          </div>
        </div>
      </div>
  </div>
</div>

<div class="section text-center">
    <h2 class="title">Visita nuestras categorías</h2>

        <form class="form-inline" method="get" action="{{ url('/search') }}">
          <input type="text" placeholder="¿Que producto buscas" class="form-control" name="query" id="search">
          <button class="btn btn-primary btn-fab btn-fab-mini btn-round" type="submit">
            <i class="material-icons">search</i>
          </button>
        </form>


    <div class="team">
      <div class="row">
        @foreach ($categories as $category)

        <div class="col-md-4">
          <div class="team-player">

            <div class="card card-plain">
              <div class="col-md-6 ml-auto mr-auto">
                <img src="{{ $category->featured_image_url }}" alt="Imagen representativa de la categoría {{ $category->name }}" class="img-raised rounded-circle img-fluid"> <!-- $category->images()->first()  ? $category->images()->first()->image : 'vacio'  -->
              </div>
              <h4 class="card-title">
                <a href="{{ url('/categories/'.$category->id) }}">{{ $category->name }}</a>
                <br>
                 <small class="card-description text-muted">{{ $category->category ? $category->category->name : 'General'}}</small>
              </h4>
              <div class="card-body">
                <p class="card-description">{{ $category->description }}</p> <!--? $category->description : 'S/d' -->
              </div>

            
            </div>
          </div>
        </div>
        @endforeach
      </div>
        <div class="col-md-3 ml-auto mr-auto text-center">
          <div class="row">
          <!--  $products->links () -->
          </div>
        </div>        
    </div>
</div>

<div class="section section-contacts">
  <div class="row">
    <div class="col-md-8 ml-auto mr-auto">
      <h2 class="text-center title">¿Aún no te has registrado?</h2>
      <h4 class="text-center description">Registrate ingresando tus datos básicos, y podrás realizar tus pedidos a través de nuestro carrito de compras. Si aún no te decides, de todas formas, con tu cuenta de usuario podrás hacer todas tus consultas sin compromiso.</h4>
      <form class="contact-form">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">Nombre</label>
              <input type="email" class="form-control">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="bmd-label-floating">Correo electrónico</label>
              <input type="email" class="form-control">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleMessage" class="bmd-label-floating">Tu mensaje</label>
          <textarea type="email" class="form-control" rows="4" id="exampleMessage"></textarea>
        </div>
        <div class="row">
          <div class="col-md-4 ml-auto mr-auto text-center">
            <button class="btn btn-primary btn-raised">
              Enviar consulta
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
   <!-- </div>
    </div>-->

@include('includes.footer')

@endsection

@section('scripts')
  <script src="{{ asset('/js/typeahead.bundle.min.js') }}"></script>
  <script>
    $(function () {
      // 
      var products = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: '{{ url("/products/json") }}'
      });
      //inicializar typehead en el input
      $('#search').typehead({
          hint: true,
          highlight: true,
          minLength: 1
      }, {
          name: 'products',
          source: products
      });
    });
  </script>
@endsection