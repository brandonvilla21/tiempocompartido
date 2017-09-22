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
                <div class="row pl-1">
                    <div class="col margin-bottom">
                        <h1 class="title">
                            {{ $membresia->descripcion }} 
                        </h1>   
                    </div>
                </div>
                <div class="row " >
                    <div class="col-xs-12 col-md-7 col-lg-7 margin-bottom">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="Profile__Gallery">
                                    <div class="Profile__Title">
                                        <h2><i class="fa fa-picture-o"></i> Galería</h2>
                                    </div>
                                    <div class="">
                                        <div class="owl-carousel owl-theme">
                                            @if(isset($membresia->imagenes[0]))
                                                @foreach($membresia->imagenes as $imagen)
                                                    @if($imagen->tipo == 'thumb')
                                                        <div>
                                                            <img src="uploads/membresias-images/{{ $imagen->src }}" alt="imagen" style="width:100%;">
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @else
                                                <div>
                                                    <img src="assets/img/sin-imagen-land.jpg" alt="imagen" style="width:100%;">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    @if(Session::has('USER_ID'))
                                        <div class="Profile__Contact" onload="isFavorite('{{$membresia->id}}', '{{Session::get('USER_ID')}}')">
                                            <i id="favoritos-heart" class="fa fa-3x fa-heart pull-right " onclick="setFavorito('{{$membresia->id}}', '{{Session::get('USER_ID')}}')" style="cursor:pointer;"></i>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-md-5 col-lg-5 margin-bottom">
                        <div class="Profile__Cost">
                            <div class="Profile__Title">
                                <h2><i class="fa fa-dollar"></i> Precio</h2>
                            </div>
                            <div class="Profile__Title">
                                @if( isset($membresia->venta) && isset($membresia->ventaPrecio) )
                                    <p class="lead" >Venta <strong>$ {{ money_format('%i', $membresia->ventaPrecio) }}</strong> <small>{{ pv($membresia, 'ventaMoneda') }}</small></p>
                                @endif
                                @if( isset($membresia->ventaNegociable) )
                                    <div class="alert alert-warning" role="alert" >¡El precio de venta es Negociable!</div>
                                @endif
                                @if( isset($membresia->renta) && isset($membresia->rentaPrecio) )
                                    <p class="lead" >Renta <strong>$ {{ money_format('%i', $membresia->rentaPrecio) }}</strong> <small>{{ pv($membresia, 'rentaMoneda') }}</small></p>
                                @endif
                                @if( isset($membresia->rentaNegociable) )  
                                    <div class="alert alert-warning" role="alert" >¡El precio de renta es Negociable!</div>
                                @endif   
                            </div>
                            <div class="Profile__Benefits">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <p>
                                        <i class="fa fa-star"></i> {{ pv($membresia, 'tipoInmueble') }}
                                    </p>
                                    <p>
                                        <i class="fa fa-bed"></i> {{ pv($membresia, 'dormitorios') }} Cuartos
                                    </p>
                                    <p>
                                        <i class="fa fa-bath"></i> {{ pv($membresia, 'banosCompletos') }} Baños
                                    </p>
                                    <p>
                                        <i class="fa fa-user-circle"></i> {{ pv($membresia, 'maxPrivacidad') }}  Personas con privacidad
                                    </p>
                                    <p>
                                        <i class="fa fa-user-circle-o"></i> {{ pv($membresia, 'maxOcupantes') }}Personas máximo
                                    </p>
                                    <p>
                                        <i class="fa fa-cutlery"></i> {{ pv($membresia, 'tipoCocina') }}
                                    </p>
                                    @if( pv($membresia, 'sala') )
                                        <p>
                                            <i class="fa fa-television"></i> Sala
                                        </p>
                                    @endif
                                    <p>
                                        <i class="fa fa-calendar-o"></i> Tipo de semana {{ pv($membresia, 'semanaTipo') }}
                                    </p>
                                    <p>
                                        <i class="fa fa-internet-explorer"></i>
                                        <strong>URL del Club: </strong>
                                         <a href="{{ pv($membresia, 'clubUrl') }}" target="_blank">{{ pv($membresia, 'clubUrl') }}</a> 
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="Profile__Availability">
                    
                            <div class="Profile__Title">
                                <h2><i class="fa fa-bookmark-o"></i> Disponibilidades</h2>
                            </div>
                            <div class="Profile__Title">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Entrada</th>
                                            <th>Salida</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        @if(isset($membresia->disponibilidades[0]))
                                            @foreach($membresia->disponibilidades as $disponibilidad)
                                                @if($disponibilidad->libre)
                                                    <tr>
                                                        <td> {{ pvDayMonth($disponibilidad, 'entrada')}} </td>
                                                        <td> {{ pvDayMonth($disponibilidad, 'salida')}} </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
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
                                    {{ pv($membresia, 'descripcion') }}
                                </p>
                                @if( strlen(pv($membresia, 'description')) > 0 )
                                    <p class="lead">
                                        <strong>English info: </strong>
                                        {{ pv($membresia, 'description') }}
                                    </p>
                                @endif
                                <p>
                                @if( isset($membresia->renta) )
                                    <span>Rento </span>
                                @endif
                                @if( isset($membresia->venta) )
                                    <span>Vendo </span>
                                @endif
                                
                                {{ pv($membresia, 'tipoInmueble') }} vacacional,
                                tipo de semana {{ pv($membresia, 'semanaTipo') }}  con
                                {{ pv($membresia, 'dormitorios') }} dormitorios,
                                {{ pv($membresia, 'banosCompletos') }} baños,
                                capacidad para {{ pv($membresia, 'maxPrivacidad') }} personas máximo,
                                capacidad con privacidad de {{ pv($membresia, 'maxOcupantes') }} personas,
                                {{ pv($membresia, 'tipoCocina') }} y mucho mas..
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
                                <form name="contactForm" method="POST" action="/contact-owner">
                                    {{csrf_field()}}
                                    @if(isset($membresia->creador->id))
                                        <input type="hidden" id="destinatario"name="destinatario" value="{{$membresia->creador->id}}"/>
                                    @endif
                                    <div class="form-group">
                                        <label for="InputEmail">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="InputFile">Mensaje</label>
                                        <textarea class="form-control" rows="5" name="cuerpo" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-default">Enviar <i class="fa fa-paper-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @if(isset($membresia->ubicacion))
                        <div class="col-xs-12 col-md-12 col-lg-12 margin-bottom">
                            <div class="Profile__Map">
                                <div class="Profile__Title">
                                    <h2><i class="fa fa-map-marker"></i> Ubicación</h2>
                                </div>
                                <div class="Map">
                                    <div id="map-component" class="embed-responsive-item"  style="height:70vh; width: 100%;"></div>
                                    
                                    <input type="hidden" id="us2-lat"  value="{{ pv($membresia->ubicacion, 'lat')}}"/>
                                    <input type="hidden" id="us2-lon"  value="{{ pv($membresia->ubicacion, 'lng')}}"/>
                                    <input type="hidden" id="us2-city" value="{{ pv($membresia->ubicacion, 'ciudad')}}"/>
                                    
                                    <input type="hidden" id="membresiaId" value="{{$membresia->id}}"/>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col-xs-12 col-md-7 col-lg-7 margin-bottom">
                        <div class="Profile__Description">
                            <div class="Profile__Title">
                                <h2><i class="fa fa-comment"></i> Comentarios</h2>
                            </div>
                            <article id="comments" class="Profile__DescriptionText">
                                <form action="/store-message" method="POST">
                                    {{csrf_field()}}
                                    <div class="form-group input-group">
                                    <input name="text" type="text" class="form-control" placeholder="Agrega tus comentarios.." ></input>
                                    <input name="membresiaId" type="hidden" value="{{ $membresia->id }}"></input>
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit" id="agregaComentario"><i class="fa fa-plus"></i></button>
                                    </span>
                                    </div>
                                </form>
                                @if(isset($membresia->messages))
                                    @foreach($membresia->messages as $message)
                                        <section>
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <div class="media">
                                                        <a class="media-left" href="">
                                                            <img class="media-object" src="assets/images/avatar.jpeg" alt="people" />
                                                        </a>
                                                        <div class="media-body">
                                                            <small class="text-grey-400 pull-right">{{ pvsDat($message, 'created') }}</small>
                                                            <h5 class="media-heading margin-v-5">comentario.user</h5>
                                                            <p class="margin-none">{{ pv($message, 'text') }}</p>
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
                                    @if( isset($membresia->creador->nickname) )
                                        <li><strong>NickName: </strong>{{ $membresia->creador->nickname}}</li>
                                    @endif
                                    @if( isset($membresia->creador->informacion) )
                                        <li><strong>Información adicional: </strong>{{ $membresia->creador->informacion }}</li>
                                    @endif
                                    @if( isset($membresia->creador->usuarioTipo) )
                                        <li><strong>Tipo de membresia: </strong> {{ $membresia->creador->usuarioTipo }}</li>
                                    @endif
                                    @if( isset($membresia->creador->email)  )
                                        <li><strong>Email: </strong>{{ $membresia->creador->email}}</li>
                                    @endif
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