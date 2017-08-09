@extends('layouts.master')
@section('content')
    <div id="inicio" class="container padding">
        <h1 class="title margin-bottom">Ingresa</h1>
        <form method="POST" action="/login" name="loginForm" role="form" class="ng-valid-email">
            {{csrf_field()}}

            <div class="form-group form-control-default required">
                <label>Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" ng-model="credentials.email" required="">
            </div>
            <div class="form-group form-control-default required">
                <label>Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" ng-model="credentials.password" required="">
            </div>
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.message')
                </div>
            </div>
            <div class="clearfix">
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-xl pull-right" ng-click="doLogin(credentials)" data-ng-disabled="loginForm.$invalid">
                        <i class="ace-icon fa fa-user"></i>
                        Ingresar
                        </button>
                    </div>
                </div>
            </div>
            <div class="clearfix">
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <p class="text-center">¿Aún no tienes una cuenta?
                            <br>
                            <a class="btn btn-primary" href="/signup">Crea tu cuenta</a>
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection