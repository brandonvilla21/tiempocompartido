@extends('layouts.master')
@section('content')
   
    <section class="agencia py-1" id="inicia">   
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xl-9 wow bounceIn" data-wow-delay=".3s">
                    <h2 class="h3 text-xs-center text-md-left margin-bottom">¿Buscas vacaciones de calidad y al mejor precio para toda la familia?</h2>
                    <p>Experimenta una diferente forma de vacacionar, disfruta de un tiempo compartido en los clubes mas importantes del mundo haciendo trato directo con los propietarios, sin intermediación, consiguiendo los mejores precios, ¿que esperas?, ¡Comienza el Viaje Ahora!.</p>
                </div>
                <div class="col-md-4 col-xl-3 wow bounceIn text-center" data-wow-delay=".6s">
                    <div class="Card__Image">
                        {{--  <img src="promociones/thumbs/{{promocionDestacada[0]->imagenes[0]->src}}" alt="imagen">  --}}
                        <img src="{{ isset($promocionDestacada[0]->imagenes[0]->src) ?  'uploads/promociones/thumbs/' . $promocionDestacada[0]->imagenes[0]->src : 'assets/img/sin-imagen-land.jpg' }}" alt="imagen"> 
                        
                    </div>
                    <div class="Footer__Content">
                        <p class="lead">
                            {{ $promocionDestacada[0]->titulo }}
                        </p>
                        <a href="/promociones" class="btn btn-success">Ver más promociones</a href="/promociones">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-1" id="">
        <div class="QuickSearch padding-row">
            <div class="container">
                <form method="POST" action="/searchFromHome">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-xs-12 col-md-12 margin-bottom">
                            <h1 class="title">
                                Encuentra las vacaciones de tus sueños
                            </h1>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 where border-gray">
                            <div class="form-group">
                                <label for="cmb__Country">Dónde?</label>
                                <select id="paisbusqueda" name="paisbusqueda" class="form-control">
                                    @foreach( $paises as $pais)
                                        <option value="{{ $pais->nombre }}">{{ $pais->nombre }}</option>
                                    @endforeach    
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 when border-gray">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-12 col-lg-12">
                                        <label for="txt__DateVacations">Busco en</label>
                                    </div>
                                    <div class="col-xs-12 col-lg-12">
                                    <select id="rentaventa" name="rentaventa" class="form-control">
                                        <option value="RENTA">RENTA</option>
                                        <option value="VENTA">VENTA</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 who border-gray">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Huéspedes?</label>
                                <input id="huespedes" name="huespedes" type="number" class="form-control" min="1" max="20" placeholder="Cuántas personas" value="1">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 search border-gray margin-fixed">
                            <div class="form-group mb-0 mt-1">
                                <button type="submit" class="btn btn-lg btn-block btn-primary">Buscar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="Latest padding-row">
            <div class="container">
                <h3 class="Latest__title pb-1 text-center tiempo-title">
                    Tiempos Compartidos ¡RECOMENDADOS!
                </h3>
                <div class="tiempo-line-bottom-container margin-bottom">
                    <span class="tiempo-line-bottom"></span>
                </div>
                <div class="Latest__content">
                    <div class="owl-carousel owl-theme">                
                        @foreach($destacados as $destacado)
                            <div class="Card">
                                <a href="/membresia/tiempo-compartido-en-{{ slugify($destacado->membresia->localidadNombre) }}-{{ slugify($destacado->membresia->clubNombre) }}-{{ slugify($destacado->membresia->paisNombre) }}/{{ $destacado->membresia->id }}">   
                                    <div class="Card__Image">
                                        <img src="{{ isset($destacado->membresia->imagenes[0]->src) ?  'uploads/membresias-images/thumbs/' . $destacado->membresia->imagenes[0]->src : 'assets/img/sin-imagen-land.jpg' }}" alt="imagen"> 
                                    </div>
                                </a>
                                <div class="Card__Content">
                                    <h4 class="Card__Content__Title">
                                        {{ pv($destacado->membresia,'titulo') }}
                                    </h4>
                                    <p  class="Card__Content__Description">
                                        {{ pv($destacado->membresia,'precioRenta') }}
                                    </p>
                                    <p  class="Card__Content__Description">
                                        {{ pv($destacado->membresia,'precioVenta') }}
                                    </p>
                                    <div class="Card__Actions no-padding-sides text-right">
                                        <a  class="btn btn-primary-outline" href="/membresia/tiempo-compartido-en-{{ slugify($destacado->membresia->localidadNombre) }}-{{ slugify($destacado->membresia->clubNombre) }}-{{ slugify($destacado->membresia->paisNombre) }}/{{ $destacado->membresia->id }}">
                                            {{ pv($destacado->membresia,'clubNombre') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="Latest nature padding-row">
            <div class="container">
                <h3 class="Latest__title pb-1 text-center tiempo-title">
                    ¿Lo mejor del verano? ¡Es momento de playa!
                </h3>
                <div class="tiempo-line-bottom-container margin-bottom">
                    <span class="tiempo-line-bottom"></span>
                </div>

                <div class="row" >
                    <div class="col-md-12">
                            <div class="owl-carousel owl-theme">
                                @foreach($membresias as $membresia)
                                    <div class="Card">
                                        <a href="/membresia/tiempo-compartido-en-{{ slugify($membresia->localidadNombre) }}-{{ slugify($membresia->clubNombre) }}-{{ slugify($membresia->paisNombre) }}/{{ $membresia->id }}">   
                                            <div class="Card__Image">
                                                <img src="{{ isset($membresia->imagenes[0]->src) ?  'uploads/membresias-images/thumbs/' . $membresia->imagenes[0]->src : 'assets/img/sin-imagen-land.jpg' }}" alt="imagen"> 
                                            </div>
                                        </a>
                                        <div class="Card__Content">
                                            <h4 class="Card__Content__Title tiempo-title-2">
                                                {{ $membresia->titulo }}  
                                            </h4>
                                            <div class="Card__Actions no-padding-sides text-right">
                                                <a  class="btn btn-primary-outline" href="/membresia/tiempo-compartido-en-{{ slugify($membresia->localidadNombre) }}-{{ slugify($membresia->clubNombre) }}-{{ slugify($membresia->paisNombre) }}/{{ $membresia->id }}">
                                                    {{ $membresia->clubNombre }} 
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="Latest padding-row">
            <div class="container">
                <h3 class="Latest__title pb-1 text-center tiempo-title">
                    ¿Buscas un momento de relajación? ¡Una cabaña en el bosque!
                </h3>
                <div class="tiempo-line-bottom-container margin-bottom">
                    <span class="tiempo-line-bottom"></span>
                </div>
                <div class="Latest__content">
                    <div class="owl-carousel owl-theme">
                        @foreach($membresiasInmueble as $membresiaCabana)
                            <div class="Card">
                                <a href="/membresia/tiempo-compartido-en-{{ slugify($membresiaCabana->localidadNombre) }}-{{ slugify($membresiaCabana->clubNombre) }}-{{ slugify($membresiaCabana->paisNombre) }}/{{ $membresiaCabana->id }}">   
                                    <div class="Card__Image">
                                        <img src="{{ isset($membresiaCabana->imagenes[0]->src) ?  'uploads/membresias-images/thumbs/' . $membresiaCabana->imagenes[0]->src : 'assets/img/sin-imagen-land.jpg' }}" alt="imagen"> 
                                    </div>
                                </a>
                                <div class="Card__Content">
                                    <h4 class="Card__Content__Title tiempo-title-2">
                                        {{ pv($membresiaCabana, 'titulo') }}
                                    </h4>
                                    <p  class="Card__Content__Description">
                                        {{ pv($membresiaCabana, 'precioRenta') }}
                                    </p>
                                    <p  class="Card__Content__Description">
                                        {{ pv($membresiaCabana, 'precioVenta') }}
                                    </p>
                                    <div class="Card__Actions no-padding-sides text-right">
                                        <a href="/membresia/tiempo-compartido-en-{{ slugify($membresiaCabana->localidadNombre) }}-{{ slugify($membresiaCabana->clubNombre) }}-{{ slugify($membresiaCabana->paisNombre) }}/{{ $membresiaCabana->id }}" class="btn btn-outline-success">   
                                            {{ pv($membresiaCabana, 'clubNombre') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="About padding-row">
            <div class="container text-center">
                <div class="About__Content">
                    <div class="About__Img">
                        <figure class="img">
                            <img src="assets/img/logo_nw.png" alt="www.tiempocompartido.com">
                        </figure>
                    </div>
                    <div class="About__Comment">
                        <p class="text margin-bottom">
                            Somos una empresa que pone a tu disposición un medio para la libre difusión de propiedades y tiempos compartidos en 
                            venta y renta entre usuarios vacacionistas, sin comisiones ni intermediarios, 
                            ¡Consigue el mejor precio para tus vacaciones!.
                        </p>
                        <h2 class="subTitleAzulMarino">Objetivo</h2>
                        <p>
                            Nuestro principal objetivo es lograr formar y mantener activa un comunidad de personas interesadas en la compra, venta y renta de semanas o membresias vacacionales, personas que
                            a travez de la plataforma consigan ese lazo entre propietarios y viajeros que como tu buscan encontrar el mejor lugar para vacacionar.
                        <p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection