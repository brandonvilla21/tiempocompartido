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

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Membresias</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($membresias as $index => $membresia)
                                    <tr>
                                        <td>
                                            {{ $membresia->titulo }}<br>
                                        </td>
                                        <td>
                                            <a  href="">
                                                <i class="fa fa-2x fa-image pull-right"
                                                    ng-click="membresiaImagenes(membresia)">
                                                </i>
                                            </a>
                                            <a  href="">
                                                <i class="fa fa-2x fa-star pull-right"
                                                    ng-click="membresiaImagenes(membresia)">
                                                </i>
                                            </a>
                                            <a  href="">
                                                <i class="fa fa-2x fa-map pull-right"
                                                    ng-click="membresiaUbicacion(membresia)">
                                                </i>
                                            <a>
                                            <a  href="">
                                                <i class="fa fa-2x fa-img pull-right"
                                                    ng-click="membresiaAfiliaciones(membresia)">
                                                </i>
                                            <a>
                                            <a  href="">
                                                <i class="fa fa-2x fa-remove pull-right"
                                                    ng-click="removeMembresia_(membresia)">
                                                </i>
                                            <a>
                                            <a  href="/edit-membresia/{{ $membresia->id }}">
                                                <i class="fa fa-2x fa-edit pull-right"></i>
                                            <a>
                                            <a  href="">
                                                <i class="fa fa-2x fa-pause pull-right"
                                                    ng-click="pauseMembresia(membresia)">
                                                </i>
                                            <a>
                                            <a  href="">
                                                <i class="fa fa-2x fa-play pull-right"
                                                    ng-click="playMembresia(membresia)">
                                                </i>
                                            <a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            
                            <a href="/new-membresia" class="width-35 pull-right btn btn-success" ng-click="newMembresia()">
                            <i class="ace-icon fa fa-plus"></i>
                                Crea nueva publicación
                            </a>
                        </div>
                    </div>
            </div>
        </section>
@endsection