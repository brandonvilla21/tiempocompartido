@extends('layouts.master')
@section('content')
    <section class="ruta py-1" id="inicia">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-xs-right">
                    <a href="/">Inicio</a> » <a href="/mi-cuenta">Mi cuenta</a> » Mis favoritos
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
                <div class="col-md-7 col-xl-8">
                    @foreach($membresias as $membresia)
                        <div class="card">
                            <div class="row">
                                <div class="col-md-4">
                                <a href="/membresia/tiempo-compartido-en-{{ slugify($membresia->membresia->localidadNombre) }}-{{ slugify($membresia->membresia->clubNombre) }}-{{ slugify($membresia->membresia->paisNombre) }}/{{ $membresia->membresia->id }}">   
                                    @if ( App\User::getPrincipalImage(getClient(), $membresia->membresia->id) != null)
                                        <img src="uploads/membresias-images/thumbs/{{ App\User::getPrincipalImage(getClient(), $membresia->membresia->id)->src }}" class="">{{-- class="w-100" --}}
                                    @else 
                                        <img src="assets/img/sin-imagen.jpg" class="">
                                    @endif
                                </a>
                                </div>
                                <div class="col-md-8 px-3">
                                    <div class="card-block pl-3">
                                        <h4 class="card-title">{{ $membresia->membresia->titulo }}</h4>
                                        <p class="card-text">{{ $membresia->membresia->descripcion }}</p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection