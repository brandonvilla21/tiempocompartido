@extends('layouts.master')
@section('content')
    <div class="container padding">
        <h1 class="title margin-bottom">Regístrate</h1>
        <form method="POST" action="" name="signupForm" role="form" class="ng-pristine ng-invalid ng-invalid-required ng-valid-email">
              {{csrf_field()}}

            <div class="row">
            <div class="col-md-12">
                <div class="form-group form-control-default required">
                <label>Usuario ó Compañia</label>
                <input type="text" class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" placeholder="Nombre" ng-model="signup.user" required="">
                </div>
            </div>
            </div>
            <div class="form-group form-control-default required">
            <label>Email</label>
            <input type="email" class="form-control ng-pristine ng-untouched ng-valid-email ng-invalid ng-invalid-required" placeholder="Email" ng-model="signup.email" required="">
            </div>
            <div class="form-group form-control-default required">
            <label>Password</label>
            <input type="password" class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" placeholder="Password" ng-model="signup.password" required="">
            </div>
            <div class="form-group form-control-default required">
            <label>Repetir password</label>
            <input type="password" class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" placeholder="Password" ng-model="signup.repassword" required="">
            </div>
            <div class="clearfix">
            <div class="row">
                <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-xl pull-right" ng-click="doSignUp(signup)" >
                <i class="ace-icon fa fa-user"></i>
                Regístrame
                </button>
                </div>
            </div>
            </div>
            <div class="clearfix">
            <div class="row">
                <div class="col-md-12">
                <br>
                <p class="text-center">¿Ya tienes una cuenta?
                    <br>
                    <a class="btn btn-primary" href="/login">Accesar</a>
                </p>
                </div>
            </div>
            </div>
        </form>
    </div>
@endsection

