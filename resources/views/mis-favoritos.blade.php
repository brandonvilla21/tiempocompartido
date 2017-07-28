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
                    <h1 class="title margin-bottom">
                        Mis favoritos
                    </h1>
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            Tus opciones en tiempo compartido
                        </a>
                        <a href="/mis-datos" class="list-group-item list-group-item-action"><i class="fa fa-user"></i> Mis datos</a>
                        <a href="/mis-membresias" class="list-group-item list-group-item-action"><i class="fa fa-home"></i> Mis membresias</a>
                        <a href="/mis-favoritos" class="list-group-item list-group-item-action active"><i class="fa fa-heart"></i> Mi lista de favoritos</a>
                        <a href="/mis-mensajes" class="list-group-item list-group-item-action"><i class="fa fa-envelope"></i> Mis mensajes</a>
                    </div>
                </div>
                <div class="col-md-7 col-xl-8 wow bounceIn" data-wow-delay=".6s">
                    
                    <div class="col-md-7 col-xl-8 padding">
                        <div class="media" ng-repeat="membresia in favoritos">
                            <div class="media-left">
                                {{--  <a ng-href="/promociones/{{promocion.titulo | slugify}}/{{promocion.id}}">  --}}
                                <a >
                                    <img ng-src="membresia.imagenes[0].src" class="media-object">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">membresia.titulo</h4>
                                membresia.descripcion
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection