@extends('layouts.app')

@section('title', 'Listado de categorias')

@section('body-class','profile-page sidebar-collapse') <!--landing-page sidebar-collapse  'profile-page'-->

@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}'); background-size: cover; background-position: top center;">
<!--url('assets/img/profile_city.jpg')">-->
</div>

<div class="main main-raised">
  <div class="container">
    <div class="section text-center">
      <h2 class="title">Listado de categorias</h2>
      
      <div class="team">
         
       <a href="{{ url('/admin/categories/create') }}" class="btn btn-primary btn-round">Nueva categoria</a>

         <div class="row"> 
          <div class="col-md-12">

          <table class="table table-striped"> <!-- table-sm  -->
              <thead> <!-- class="thead-light" -->
                  <tr>
                      <!-- <th class="text-center">#</th> -->
                      <th class="text-center">Nombre</th>
                      <th class="text-center">Descripción</th>
                      <th class="text-center">Opciones</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($categories as $key => $category)
                  
                  <tr>
                      <!--<td class="text-center">{{ ($key+1) }}</td>  $category->id -->
                      <td>{{$category->name}}</td>
                      <td class="">{{$category->description}}</td> <!--description-->
                      <td class="td-actions text-right" >
                                                   
                          <form method="post" action="{{ url('/admin/categories/'.$category->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a type="button" rel="tooltip" title="Ver categoría" class="btn btn-info btn-link btn-sm">
                            <i class="fa fa-info"></i>
                            </a>
                            <a href="{{ url('/admin/categories/'.$category->id.'/edit') }}" rel="tooltip" title="Editar categoría" class="btn btn-success btn-link btn-sm">  <!-- btn btn-success btn-simple btn-link -->
                                <i class="fa fa-edit"></i>
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

          {{ $categories->links() }}
        </div>
      </div>
      
      
      </div>

    </div>
  </div>
</div> 

@include('includes.footer')

@endsection