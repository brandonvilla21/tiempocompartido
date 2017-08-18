@extends('layouts.master')
@section('content')
    <section class="ruta py-1" id="inicia">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-xs-right">
                    <a href="/">Inicio</a> » <a href="/mi-cuenta">Mi cuenta</a> » Modifica tu contraseña
                </div>
            </div>
        </div>
    </section>
     <section  class="py-1">   
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-xl-4">
                    @include('layouts.menu-cuenta')
                </div>
                <div class="col-md-7 col-xl-8"> 
                    <div class="container padding">
                        <h2 class="title margin-bottom">Modifica tu contraseña</h2>
                         <div class="mt-1">
                            @include('layouts.message')
                         </div>
                         <form method="POST" action="/guardar-contrasena" role="form">
                             {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-control-default required">
                                        <label>Contraseña actual</label>
                                        <input id="oldPassword" name="oldPassword" type="password" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-control-default required">
                                        <label>Nueva contraseña</label>
                                        <input id="newPassword" name="newPassword" type="password" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-control-default required">
                                        <label>Ingrese de nuevo la nueva contraseña</label>
                                        <input id="newPasswordConfirm" name="newPasswordConfirm" type="password" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                             <div class="clearfix">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-xl pull-right" >
                                                <i class="ace-icon fa fa-user"></i>
                                                Guardar Cambios
                                            </button>
                                        </div>
                                    </div>
                                </div>
                         </form>
                        
                    </div>
                </div>        
            </div>
        </div>
    </section>
   
@endsection