@extends('layouts.master')
@section('content')
    <section class="ruta py-1" id="inicia">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-xs-right">
                    <a href="/">Inicio</a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-1" id="">
        <div class="Membresia padding-row">
            <div class="container">
                <div class="row">
                    <div class="col margin-bottom">
                        <h1 class="title">
                            {{ $membresia->descripcion }} 
                        </h1>   
                </div>
                <div class="row container" style="width:100%;">
                    <div class="col-xs-12 col-md-7 col-lg-7 margin-bottom">
                        <div class="Profile__Gallery">
                            <div class="Profile__Title">
                                <h2><i class="fa fa-picture-o"></i> Galería</h2>
                            </div>
                            <div class="container">
                                <div class="owl-carousel">
                                    @if(isset($membresia->imagenes))
                                        @foreach($membresia->imagenes as $imagen)
                                            @if($imagen->tipo == 'thumb')
                                                <div>
                                                    <img src="uploads/membresias-images/{{ $imagen->src }}" alt="imagen" style="width:100%;">
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                                    <div class="owl-nav">
                                        <i class="btn btn-primary-outline am-prev mb-1 fa fa-2x fa-chevron-left mr-1"></i>
                                        <i class="btn btn-primary-outline am-next fa fa-2x fa-chevron-right"></i>
                                    </div>
                            </div>
                            <div class="Profile__Contact">
                                @if(Session::has('USER_ID'))
                                    <i id="favoritos-heart" class="fa fa-2x fa-heart pull-right" onclick="setFavorito('{{$membresia->id}}', '{{Session::get('USER_ID')}}', {{$isFavorito ? 'true' : 'false'}})" style="color: {{$isFavorito ? 'red' : 'gray'}}; cursor: pointer;"></i>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="col-xs-12 col-md-5 col-lg-5 margin-bottom">
                        <div class="Profile__Cost">
                            <div class="Profile__Title">
                                <h2><i class="fa fa-dollar"></i> Precio</h2>
                            </div>
                            <div class="Profile__Title">
                                @if( $membresia->venta )
                                    <p class="lead" >Venta <strong>$ {{ money_format('%i',$membresia->ventaPrecio) }}</strong> <small>{{ $membresia->ventaMoneda }}</small></p>
                                @endif
                                @if( $membresia->ventaNegociable )
                                    <div class="alert alert-warning" role="alert" >¡El precio de venta es Negociable!</div>
                                @endif
                                @if( $membresia->renta )
                                    <p class="lead" >Renta <strong>$ {{ money_format('%i',$membresia->rentaPrecio) }}</strong> <small>{{ $membresia->rentaMoneda }}</small></p>
                                @endif
                                @if( $membresia->rentaNegociable )  
                                    <div class="alert alert-warning" role="alert" >¡El precio de renta es Negociable!</div>
                                @endif   
                            </div>
                            <div class="Profile__Benefits">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <p>
                                        <i class="fa fa-star"></i> {{ $membresia->tipoInmueble }}
                                    </p>
                                    <p>
                                        <i class="fa fa-bed"></i> {{ $membresia->dormitorios }} Cuartos
                                    </p>
                                    <p>
                                        <i class="fa fa-bath"></i> {{ $membresia->banosCompletos }} Baños
                                    </p>
                                    <p>
                                        <i class="fa fa-user-circle"></i> {{ $membresia->maxPrivacidad }}  Personas con privacidad
                                    </p>
                                    <p>
                                        <i class="fa fa-user-circle-o"></i> {{ $membresia->maxOcupantes }}Personas máximo
                                    </p>
                                    <p>
                                        <i class="fa fa-cutlery"></i> {{ $membresia->tipoCocina }}
                                    </p>
                                    @if( $membresia->sala )
                                        <p>
                                            <i class="fa fa-television"></i> Sala
                                        </p>
                                    @endif
                                    <p>
                                        <i class="fa fa-calendar-o"></i> Tipo de semana {{ $membresia->semanaTipo }}
                                    </p>
                                    <p>
                                        <i class="fa fa-calendar"></i>
                                        <strong>Fecha de entrada: </strong>
                                        membresia.entrada
                                    <p>
                                        <i class="fa fa-calendar"></i>
                                        <strong>Fecha de salida: </strong>
                                        membresia.salida
                                    </p>
                                    <p>
                                        <i class="fa fa-internet-explorer"></i>
                                        <strong>URL del Club: </strong>
                                         <a href="{{ $membresia->clubUrl }}" target="_blank">{{ $membresia->clubUrl }}</a> 
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
                                    {{ $membresia->descripcion }}
                                </p>
                                @if( strlen($membresia->description) > 0 )
                                    <p class="lead" ng-show="membresia.description != ''">
                                        <strong>English info: </strong>
                                        {{ $membresia->description }}
                                    </p>
                                @endif
                                <p>
                                @if( $membresia->renta )
                                    <span>Rento </span> 
                                @endif
                                @if( $membresia->venta )
                                    <span>Vendo </span>
                                @endif
                                
                                {{ $membresia->tipoInmueble }} vacacional,
                                tipo de semana {{ $membresia->semanaTipo }}  con
                                {{ $membresia->dormitorios }} dormitorios,
                                {{ $membresia->banosCompletos }} baños,
                                capacidad para {{ $membresia->maxPrivacidad }} personas máximo,
                                capacidad con privacidad de {{ $membresia->maxOcupantes }} personas,
                                {{ $membresia->tipoCocina }} y mucho mas..
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
                                        <input type="email" class="form-control" id="InputEmail" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="InputPassword">Correo</label>
                                        <input type="password" class="form-control" id="InputPassword" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="InputFile">Mensaje</label>
                                        <textarea class="form-control" rows="5" required></textarea>
                                    </div>
                                    <button ng-click="sendMailContact(contacto)" type="submit" class="btn btn-default">Enviar <i class="fa fa-paper-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-12 col-lg-12 margin-bottom" ng-show="membresia.ubicacion">
                        <div class="Profile__Map">
                            <div class="Profile__Title">
                                <h2><i class="fa fa-map-marker"></i> Ubicación</h2>
                            </div>
                            <div class="Map">
                                <div id="map-component" class="embed-responsive-item"  style="height:70vh; width: 100%;"></div>
                                @if(isset($membresia->ubicacion))
                                    <input type="hidden" id="us2-lat"  value="{{ pv($membresia->ubicacion, 'lat')}}"/>
                                    <input type="hidden" id="us2-lon"  value="{{ pv($membresia->ubicacion, 'lng')}}"/>
                                    <input type="hidden" id="us2-city" value="{{ pv($membresia->ubicacion, 'ciudad')}}"/>
                                @else
                                    <input type="hidden" id="us2-lat"  value="19.4326077" />
                                    <input type="hidden" id="us2-lon"  value="-99.13320799999997" />
                                    <input type="hidden" id="us2-city" />

                                @endif
                                <input type="hidden" id="membresiaId" value="{{$membresia->id}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-7 col-lg-7 margin-bottom">
                        <div class="Profile__Description">
                            <div class="Profile__Title">
                                <h2><i class="fa fa-comment"></i> Comentarios</h2>
                            </div>
                            <article id="comments" class="Profile__DescriptionText">
                                <form action="/store-message" method="POST">
                                    {{csrf_field()}}
                                    <div class="form-group input-group">
                                    <input name="text" type="text" class="form-control" placeholder="Agrega tus comentarios.." ng-model="comentario"></input>
                                    <input name="membresiaId" type="hidden" value="{{ $membresia->id }}"></input>
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit" id="agregaComentario"><i class="fa fa-plus"></i></button>
                                    </span>
                                    </div>
                                </form>
                                @if(isset($membresia->messages))
                                    @foreach($membresia->messages as $message)
                                        <section ng-class="{'comment-reply': comentario.lresp}" ng-repeat="comentario in membresia.comentarios">
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <div class="media">
                                                        <a class="media-left" href="">
                                                            <img class="media-object" src="assets/images/avatar.jpeg" alt="people" />
                                                        </a>
                                                        <div class="media-body">
                                                            <small class="text-grey-400 pull-right">{{ pvsDat($message, 'created') }}</small>
                                                            <h5 class="media-heading margin-v-5">comentario.user</h5>
                                                            <p class="margin-none">{{ $message->text }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </section>
                                    @endforeach
                                @endif
                            </article>
                        </div>
                    </div>
                     <div class="col-xs-12 col-md-5 col-lg-5 margin-bottom">
                        <div class="Profile__ContactForm">
                            <div class="Profile__Title">
                                <h2><i class="fa fa-user-o"></i> Datos del propietario</h2>
                            </div>
                            <div class="col-xs-12 col-lg-12">
                                <ul class="padding">
                                    @if( isset($membresia->creador->name) )                            
                                        <li><strong>Nombre: </strong>{{ $membresia->creador->name}}</li>
                                    @endif
                                    <li><strong>NickName: </strong>{{ $membresia->creador->nickname}}</li>
                                    @if( isset($membresia->creador->informacion) )
                                        <li><strong>Información adicional: </strong>{{ $membresia->creador->informacion }}</li>
                                    @endif
                                    @if( isset($membresia->creador->usuarioTipo) )
                                        <li><strong>Tipo de membresia: </strong> {{ $membresia->creador->usuarioTipo }}</li>
                                    @endif                                    
                                    <li><strong>Email: </strong>{{ $membresia->creador->email}}</li>
                                    
                                    @if( isset($membresia->creador->ciudad) )
                                        <li><strong>Ciudad: </strong> {{ $membresia->creador->ciudad }}</li>
                                    @endif
                                    @if( isset($membresia->creador->pais) )
                                        <li><strong>Pais: </strong> {{ $membresia->creador->pais }}</li>
                                    @endif
                                    @if( isset($membresia->creador->lenguaje) )                                    
                                        <li><strong>Lenguaje: </strong> {{ $membresia->creador->lenguaje }}</li>
                                    @endif
                                    @if( isset($membresia->creador->telefono) )
                                        <li><strong>Teléfono: </strong> {{ $membresia->creador->telefono }} </li>
                                    @endif
                                    @if( isset($membresia->creador->destinosInteres) )
                                        <li><strong>Interesado en viajar a: </strong> $membresia->creador->destinosInteres</li>
                                    @endif
                                </ul>
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