@extends('layouts.app')

@section('body-class', 'signup-page')

@section('content')

  <div class="page-header header-filter" style="background-image: url('{{asset('img/bg7.jpg')}}'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Inicio de sesión</h4>

              </div>
              <p class="description text-center">Ingresa tus datos</p>
              <div class="card-body">

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input id="email" type="email" class="form-control" placeholder="Correo Electrónico" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input placeholder="Contraseña" id="password" type="password" class="form-control" name="password" required/>
               </div>
                
            <dir class="form-group">            
              <div class="chekbox">
                  <label>
                    <input type="checkbox" name="remember" {{ old('remembre') ? 'checked':''}}>
                    Recordar sesión
                  </label>
              </dir>

              </div>
              <div class="footer text-center">
                <button type="submit" class="btn btn-simple btn-primary btn-lg">INGRESAR</button>
              </div>
              <!-- <a recordr password -->
               <!-- <div class="copyright float-right">
                    <a href="/" class="btn btn-primary btn-link btn-wd btn-lg">Olvidaste tu contraseña</a>
                -->    
                      <div class="copyright float-right">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('¿Olvidaste tu contraseña?') }}
                            </a>
                        @endif
                    </div>
                </div>
  
            </form>
          </div>
        </div>
      </div>
    </div>

@include('includes.footer')
</div>

@endsection
