<!DOCTYPE html>
<html lang="{{ app()->getlocale() }}"> <!-- lang="en" -->

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>
    @yield('title', 'Tienda Virtual App Shop')
  </title>

  <!--<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />-->
  <meta content='width=device-width, initial-scale=1.0, maximun-scale=1.0, user-scalable=0' name='viewport' />


  <!--     Fonts and icons  -->   
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

   <!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.mini.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/material-kit.css') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
    @yield('styles')

</head>

<body class="@yield('body-class')"> <!-- "landing-page sidebar-collapse-->
      <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">

        <div class="container">

              <div class="navbar-translate">
                    
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="navbar-toggler-icon"></span>
                      <span class="navbar-toggler-icon"></span>
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- nombre app shop -->
                    <a class="navbar-brand" href="{{ url('/') }}">App shop</a>
              </div>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    
                        @guest
                            <li class="nav-item">   
                                <a class="nav-link" href="{{ route('login') }}">Ingresar</a>
                            </li>
                            @if (Route::has('register'))
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('register') }}">Registro</a>
                              </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <li>
                                    <a href="{{ url('/home') }}">Dashboard</a>
                                  </li>
                                  @if (auth()->user()->admin)
                                  <li>
                                   <a href="{{ url('/admin/products') }}">Gestionar productos</a>
                                  </li>
                                  @endif
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                      <!-- {{ __('Logout') }} -->Salir
                                  </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @endguest
                         <!-- <li class="nav-item">
                            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank" data-original-title="Follow us on Twitter" rel="nofollow">
                              <i class="fa fa-twitter"></i>
                            </a>
                          </li> -->
                 </ul>
            </div>

        </div>
    </nav>
       
  <div class="wrapper">   
    @yield('content')
  </div>
 
</body>

 <!-- script -->
  <!--<script src=" asset('js/app.js') }}"></script>-->
  <script src="{{ asset('js/core/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>

  <script src="{{ asset('js/plugins/moment.min.js') }}"></script>

  <script src="{{ asset('js/plugins/nouislider.min.js" type="text/javascript') }}"></script>
  <script src="{{ asset('js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script> 
 
  <script src="{{ asset('js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
 
  <script src="{{ asset('js/material-kit.js') }}" type="text/javascript></script"></script>

</html>