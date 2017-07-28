@extends('layouts.master')
@section('content')
    <section class="ruta py-1" id="inicia">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-xs-right">
                    <a href="/">Inicio</a> » <a href="/promociones">Promociones</a>
                </div>
            </div>
        </div>
    </section>
    <section class="py-1">   
        <div class="QuickSearch padding-row">
            <div class="container">

                <div class="row">
                    <div class="col-xs-12 col-lg-12 margin-bottom">
                        <h1 class="title">
                            promocion.descripcion
                        </h1>
                    </div>
                    <div class="col-xs-12 col-md-7 col-lg-7 margin-bottom">
                        <div class="Profile__Gallery">
                            <div class="Profile__Title">
                                <h2><i class="fa fa-picture-o"></i> Galería</h2>
                            </div>
                            <div class="Profile__GalleryImages">
                                <figure class="img">
                                    {{--  <img ng-src="{{carrusel_img_src}}" class="img-fluid">  --}}
                                    <img ng-src="" class="img-fluid">
                                </figure>
                                <data-owl-carousel id="Profile__Gallery" class="owl-carousel owl-theme" data-options="{navigation: true, pagination: false, rewindNav : false}">
                                    <div class="item" owl-carousel-item="" ng-repeat="imagen in promocion.imagenes" class="item">
                                        <figure class="img">
                                            {{--  <img ng-src="{{imagen.src}}" class="img-fluid" ng-click="cambiaImagenCarrusel(imagen.src)">  --}}
                                            <img ng-src="imagen.src" class="img-fluid" ng-click="cambiaImagenCarrusel(imagen.src)">
                                        </figure>
                                    </div>
                                </data-owl-carousel>
                            </div>
                            <div class="Profile__Contact">
                                <a class="btn btn-primary btn-lg" href="#contactar">
                                    <i class="fa fa-phone"></i> Contactar
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-5 col-lg-5 margin-bottom">
                        <div class="Profile__Cost">
                            <div class="Profile__Title">
                                <h2><i class="fa fa-dollar"></i> Precio</h2>
                            </div>
                            <div class="Profile__Title">
                                <p class="lead" ng-show="promocion.venta">Venta <small>promocion.ventaPrecio | currency promocion.ventaMoneda</small></p>
                                <div class="alert alert-success" role="alert" ng-show="promocion.ventaNegociable">¡Este precio es Negociable!</div>
                                <p class="lead" ng-show="promocion.renta">Renta <small>promocion.rentaPrecio | currency promocion.rentaMoneda</small></p>
                                <div class="alert alert-success" role="alert" ng-show="promocion.rentaNegociable">¡Este precio es Negociable!</div>
                            </div>
                            <div class="Profile__Benefits">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <p>
                                        <i class="fa fa-star"></i> promocion.tipoInmueble
                                    </p>
                                    <p>
                                        <i class="fa fa-bed"></i>promocion.dormitorios Cuartos
                                    </p>
                                    <p>
                                        <i class="fa fa-bath"></i> promocion.banosCompletos Baños
                                    </p>
                                    <p>
                                        <i class="fa fa-user-circle"></i> promocion.maxPrivacidad  Personas con privacidad
                                    </p>
                                    <p>
                                        <i class="fa fa-user-circle-o"></i> promocion.maxOcupantes Personas máximo
                                    </p>
                                    <p>
                                        <i class="fa fa-cutlery"></i> promocion.tipoCocina
                                    </p>
                                    <p ng-show="promocion.sala">
                                        <i class="fa fa-television"></i> Sala
                                    </p>
                                    <p>
                                        <i class="fa fa-calendar-o"></i> Tipo de semana promocion.semanaTipo
                                    </p>
                                    <p>
                                        <i class="fa fa-calendar"></i>
                                        <strong>Fecha de entrada: </strong>
                                        promocion.entrada
                                    <p>
                                        <i class="fa fa-calendar"></i>
                                        <strong>Fecha de salida: </strong>
                                        promocion.salida
                                    </p>
                                    <p>
                                        <i class="fa fa-internet-explorer"></i>
                                        <strong>URL del Club: </strong>
                                        {{--  <a href="{{promocion.clubUrl}}" target="_blank">{{promocion.clubUrl}}</a>  --}}
                                        <a href="promocion.clubUrl" target="_blank">promocion.clubUrl</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-7 col-lg-7 margin-bottom">
                        <div class="Profile__Description">
                            <div class="Profile__Title">
                                <h2><i class="fa fa-align-left"></i> Descripción</h2>
                            </div>
                            <article class="Profile__DescriptionText">
                                <p> 
                                    promocion.descripcion
                                </p>
                                <p class="lead" ng-show="promocion.description != ''">
                                    <strong>English info: </strong>
                                    promocion.description
                                </p>
                                <p>
                                <span ng-show="promocion.renta">Rento </span>
                                <span ng-show="promocion.venta">Vendo </span>
                                promocion.tipoInmueble vacacional,
                                tipo de semana promocion.tipo_semana con
                                promocion.dormitorios dormitorios,
                                promocion.banosCompletos baños,
                                capacidad para promocion.maxPrivacidad personas máximo,
                                capacidad con privacidad de promocion.maxOcupantes personas,
                                promocion.tipoCocina y mucho mas..
                                </p>
                            </article>
                        </div>
                    </div>
                    <div id="contactar" class="col-xs-12 col-md-5 col-lg-5 margin-bottom">
                        <div class="Profile__ContactForm">
                            <div class="Profile__Title">
                                <h2><i class="fa fa-envelope-o"></i> Contácta al propietario</h2>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <form name="contactForm" >
                                    <div class="form-group">
                                        <label for="InputEmail">Nombre</label>
                                        <input type="email" class="form-control" id="InputEmail" placeholder="Email" ng-model="contacto.nombre" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="InputPassword">Correo</label>
                                        <input type="password" class="form-control" id="InputPassword" placeholder="Password" ng-model="contacto.email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="InputFile">Mensaje</label>
                                        <textarea class="form-control" rows="5" ng-model="contacto.mensaje" required></textarea>
                                    </div>
                                    <button ng-click="sendMailContact(contacto)" data-ng-disabled="contactForm.$invalid" type="submit" class="btn btn-default">Enviar <i class="fa fa-paper-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-12 col-lg-12 margin-bottom" ng-show="promocion.ubicacion">
                        <div class="Profile__Map">
                            <div class="Profile__Title">
                                <h2><i class="fa fa-map-marker"></i> Ubicación</h2>
                            </div>
                            <div class="Map">
                                <div id="map" class="embed-responsive-item"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-lg-12 margin-bottom">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="expandable expandable-trigger">
                                        <div class="expandable-content" style="min-height: 250px;">
                                            <h4>Comentarios</h4>
                                            <form>
                                                <div class="form-group input-group">
                                                <input type="text" class="form-control" placeholder="Agrega tus comentarios.." ng-model="comentario"></input>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary" type="button" id="agregaComentario"><i class="fa fa-plus"></i></button>
                                                </span>
                                                </div>
                                            </form>
                                    
                                            <section ng-class="{'comment-reply': comentario.lresp}"
                                                ng-repeat="comentario in promocion.comentarios">
                                                <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <div class="media">
                                                    <a class="media-left" href="">
                                                        <img class="media-object" src="assets/images/avatar.jpeg" alt="people" />
                                                    </a>
                                                    <div class="media-body">
                                                        <small class="text-grey-400 pull-right">comentario.fecha</small>
                                                        <h5 class="media-heading margin-v-5">comentario.user</h5>
                                                        <p class="margin-none">comentario.texto</p>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </section>
                                
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h4>Acerca del propietario</h4>
                                    <div class="media media-clearfix-xs-min">
                                        <div class="media-body">
                                            <ul class="property-facilities">
                                                <li><strong>Nombre: </strong>promocion.creador.name</li>
                                                <li><strong>NickName: </strong>promocion.creador.nickname</li>
                                                <li><strong>Información adicional: </strong>promocion.creador.informacion</li>
                                                <li><strong>Tipo de promocion: </strong>promocion.creador.tipo_promocion</li>
                                                <li><strong>Email: </strong>promocion.creador.email</li>
                                                <li><strong>Ciudad: </strong>promocion.creador.ciudad</li>
                                                <li><strong>Pais: </strong>promocion.creador.pais</li>
                                                <li><strong>Lenguaje: </strong>promocion.creador.lenguajes</li>
                                                <li><strong>Telefono: </strong>promocion.creador.telefono</li>
                                                <li><strong>Interesado en viajar a: </strong>promocion.creador.destinos</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr width="100%">
                    <div class="col-xs-12 col-lg-12 margin-bottom">
                        <h2 class="title">
                            Otros tiempos compartidos relacionados.
                        </h2>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-6 margin-bottom">
                        <div class="Card">
                            <div class="Card__Image">
                                <img src="assets/img/nature.jpg" alt="">
                            </div>
                            <div class="Card__Content">
                                <h4 class="Card__Content__Titl">
                                    Residencia en el bosque de chapultepec
                                </h4>
                            </div>
                            <div class="Card__Actions">
                                <button class="btn btn-default">
                                    Ver propiedad
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-6 margin-bottom">
                        <div class="Card">
                            <div class="Card__Image">
                                <img src="assets/img/nature.jpg" alt="">
                            </div>
                            <div class="Card__Content">
                                <h4 class="Card__Content__Titl">
                                    Residencia en el bosque de chapultepec
                                </h4>
                            </div>
                            <div class="Card__Actions">
                                <button class="btn btn-default">
                                    Ver propiedad
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection