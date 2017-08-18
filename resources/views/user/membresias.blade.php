@extends('layouts.master')
@section('content')
        <section class="ruta py-1" id="inicia">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-xs-right">
                        <a href="/">Inicio</a> » <a href="/mi-cuenta">Mi cuenta</a> » Mis membresias
                    </div>
                </div>
            </div>
        </section>
        <section class="py-1">   
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-xl-4">
                        @include('layouts.menu-cuenta')
                    </div>
                    <div class="col-md-7 col-xl-8 padding">
                        @foreach($membresias as $index => $membresia)
                            <div class="card">
                                <div class="row ">
                                    <div class="col-md-4">
                                     @if ( App\User::getPrincipalImage(getClient(), $membresia->id) != null)
                                        <img src="uploads/membresias-images/thumbs/{{ App\User::getPrincipalImage(getClient(), $membresia->id)->src }}" class="">{{-- class="w-100" --}}
                                    @else 
                                        <img src="assets/img/sin-imagen.jpg" class="">
                                    @endif
                                    </div>
                                    <div class="col-md-8 px-3">
                                        <div class="card-block pl-3">
                                            <h4 class="card-title">{{ $membresia->titulo }}</h4>
                                            <p class="card-text">{{ $membresia->descripcion }}</p>
                                            <hr>
                                            <div>
                                                @include('layouts.membresia-opciones')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    <a href="/new-membresia" class="width-35 pull-right btn btn-success" ng-click="newMembresia()">
                        <i class="ace-icon fa fa-plus"></i>
                            Crea nueva publicación
                    </a>
                    </div>
                    
                </div>
            </div>
        </section>
@endsection