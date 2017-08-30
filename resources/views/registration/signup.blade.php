@extends('layouts.master')
@section('content')
    <div id="inicio" class="container padding">
        <h1 class="title margin-bottom">Regístrate</h1>
        <form ng-controller="MainCtrl as main" method="POST" action="/signup" name="signupForm" role="form" >
              {{csrf_field()}}

            <div class="form-group " ng-class="{'has-danger': signupForm.user.$touched && signupForm.user.$invalid, 'has-success': signupForm.user.$touched && signupForm.user.$valid}">
                <label>Usuario ó Compañia</label>
                <input type="text" id="user" name="user" class="form-control " placeholder="Nombre" ng-model="data.user" required ng-class="{'form-control-danger': signupForm.user.$touched && signupForm.user.$invalid, 'form-control-success': signupForm.user.$touched && signupForm.user.$valid}">
                <div class="form-control-feedback" ng-messages="signupForm.user.$error" ng-show="signupForm.user.$invalid && signupForm.user.$touched">
                    <p>Debes completar este campo.</p>
                </div>
            </div>
            <div class="form-group " ng-class="{'has-danger': signupForm.email.$touched && signupForm.email.$invalid, 'has-success': signupForm.email.$touched && signupForm.email.$valid}">
                <label>Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" ng-model="data.email" required ng-class="{'form-control-danger': signupForm.email.$touched && signupForm.email.$invalid, 'form-control-success': signupForm.email.$touched && signupForm.email.$valid}">
                <div class="form-control-feedback" ng-messages="signupForm.email.$error" ng-show="signupForm.email.$invalid && signupForm.email.$touched">
                    <p>Email inválido.</p>
                </div>
            </div>
            <div class="form-group " ng-class="{'has-danger': signupForm.password.$touched && signupForm.password.$invalid, 'has-success': signupForm.password.$touched && signupForm.password.$valid}">
                <label>Password</label>
                <input type="password" id="password" name="password" class="form-control " placeholder="Password"  ng-minlength="5" ng-model="data.password" required ng-class="{'form-control-danger': signupForm.password.$touched && signupForm.password.$invalid, 'form-control-success': signupForm.password.$touched && signupForm.password.$valid}">
                <div class="form-control-feedback" ng-messages="signupForm.password.$error" ng-show="signupForm.password.$invalid && signupForm.password.$touched">
                    <p ng-show="signupForm.password.$error.required">Debes completar este campo.</p>
                    <p ng-show="signupForm.password.$error.minlength">La contraseña debe tener mínimo 5 carácteres.</p>
                </div>
            </div>
            <div class="form-group " ng-class="{'has-danger': signupForm.password_confirm.$touched && signupForm.password_confirm.$invalid, 'has-success': signupForm.password_confirm.$touched && signupForm.password_confirm.$valid}">
                <label>Repetir password</label>
                <input pw-check='password' type="password" id="password_confirm" name="password_confirm" class="form-control " placeholder="Password" ng-model="data.repassword" required ng-class="{'form-control-danger': signupForm.password_confirm.$touched && signupForm.password_confirm.$invalid, 'form-control-success': signupForm.password_confirm.$touched && signupForm.password_confirm.$valid}">
                <div class="form-control-feedback" ng-messages="signupForm.password_confirm.$error" ng-show="signupForm.password_confirm.$invalid && signupForm.password_confirm.$touched">
                    <p ng-show='signupForm.password_confirm.$error.required'>Debes completar este campo.</p>
                    <p ng-show='signupForm.password_confirm.$error.pwmatch'>Las contraseñas no coinciden.</p>
                </div>
            </div>
            <div class="clearfix">
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-xl pull-right" data-ng-disabled="signupForm.$invalid" >
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

