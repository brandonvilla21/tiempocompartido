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

                            <div class="media" ng-repeat="membresia in membresias">
                                <div class="media-left">
                                    <img ng-src="membresia.imagenes[0].src" class="media-object">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">membresia.titulo</h4>
                                    membresia.descripcion

                                    <i class="fa fa-2x fa-star pull-right"
                                        ng-click="membresiaImagenes(membresia)">
                                    </i>
                                    <i class="fa fa-2x fa-map pull-right"
                                        ng-click="membresiaUbicacion(membresia)">
                                    </i>
                                    <i class="fa fa-2x fa-img pull-right"
                                        ng-click="membresiaAfiliaciones(membresia)">
                                    </i>
                                    <i class="fa fa-2x fa-remove pull-right"
                                        ng-click="removeMembresia_(membresia)">
                                    </i>
                                    <i class="fa fa-2x fa-edit pull-right"
                                        ng-click="editMembresia(membresia)">
                                    </i>
                                    <i class="fa fa-2x fa-pause pull-right"
                                        ng-click="pauseMembresia(membresia)">
                                    </i>
                                    <i class="fa fa-2x fa-play pull-right"
                                        ng-click="playMembresia(membresia)">
                                    </i>


                                </div>
                            </div>

                            membresia.status
                            <a href="/new-membresia" class="width-35 pull-right btn btn-success" ng-click="newMembresia()">
                            <i class="ace-icon fa fa-plus"></i>
                                Crea nueva publicación
                            </a>
                        </div>
                    </div>
            </div>
        </section>
@endsection