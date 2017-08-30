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
                        {{--  <img src="promocion.imagenes[0].src" alt="imagen">  --}}
                        <img src="http://www.tiempocompartido.com/catalogo_imgs/marriottnewportcoastvillas-newportcoast--3149.jpg" alt="imagen">
                    </div>
                    <div class="Footer__Content">
                        <p class="lead">
                        {{--  promocion.titulo  --}}
                        3 Noches Gratis!
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
                <div class="row">
                    <div class="col-xs-12 col-md-12 margin-bottom">
                        <h1 class="title">
                            Encuentra las vacaciones de tus sueños
                        </h1>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 where border-gray">
                        <div class="form-group">
                            <label for="cmb__Country">Dónde?</label>

                            <input type="text" class="form-control" id="cmb__Country" placeholder="Destino, Ciudad" list="locations">
                            <datalist id="locations">
                                    <optgroup label="Argentina"><option value="Bariloche">Bariloche</option><option value="Buenos Aires">Buenos Aires</option><option value="Cabalango">Cabalango</option><option value="Capital Federal">Capital Federal</option><option value="Carlos Paz">Carlos Paz</option><option value="Caviahue">Caviahue</option><option value="Chapadmalal">Chapadmalal</option><option value="Costa Del Este">Costa Del Este</option><option value="Las Grutas">Las Grutas</option><option value="Las Le&amp;ntilde;as">Las Leñas</option><option value="Maipu">Maipu</option><option value="Malargue">Malargue</option><option value="Mar Del Plata">Mar Del Plata</option><option value="Pinamar">Pinamar</option><option value="San Bernardo">San Bernardo</option><option value="San Carlos De Bariloche">San Carlos De Bariloche</option><option value="San Carolos De Bariloche">San Carolos De Bariloche</option><option value="San Martin De Los Andes">San Martin De Los Andes</option><option value="Villa Carlos Paz">Villa Carlos Paz</option><option value="Villa La Angostura">Villa La Angostura</option></optgroup><optgroup label="Aruba"><option value="Aruba">Aruba</option><option value="Aruba-oranjestad">Aruba-oranjestad</option><option value="Eagle Beach">Eagle Beach</option><option value="Oranjestad">Oranjestad</option></optgroup><optgroup label="Belice"><option value="Cayo Ambergris">Cayo Ambergris</option></optgroup><optgroup label="Brasil"><option value="Buzios">Buzios</option><option value="Fortaleza">Fortaleza</option><option value="Porto Belo">Porto Belo</option></optgroup><optgroup label="Canada"><option value="Whistler">Whistler</option></optgroup><optgroup label="Chile"><option value="Con Con">Con Con</option><option value="Pucon">Pucon</option><option value="Re&amp;ntilde;aca">Reñaca</option><option value="Santiago">Santiago</option><option value="Vi&amp;ntilde;a Del Mar">Viña Del Mar</option><option value="Villarrica">Villarrica</option></optgroup><optgroup label="Colombia"><option value="Baq">Baq</option><option value="Bogota">Bogota</option><option value="Cartagena">Cartagena</option><option value="Santa Marta">Santa Marta</option></optgroup><optgroup rica="" label="Costa"><option value="10 Minutos De El Coco">10 Minutos De El Coco</option><option value="Alajuela">Alajuela</option><option value="Carrillo">Carrillo</option><option value="El Roble">El Roble</option><option value="El Roble Puntarenas">El Roble Puntarenas</option><option value="Guanacaste">Guanacaste</option><option value="La Cruz">La Cruz</option><option value="Liberia">Liberia</option><option value="Nicoya">Nicoya</option><option value="Playa Hermosa">Playa Hermosa</option><option value="Playas Del Coco">Playas Del Coco</option><option value="Puntarenas">Puntarenas</option><option value="Santa Cruz Gte.">Santa Cruz Gte.</option></optgroup><optgroup label="Ecuador"><option value="Gal&amp;aacute;pagos">Galápagos</option><option value="Salinas">Salinas</option></optgroup><optgroup label="España"><option value="Alfas Del Pi  Alicante">Alfas Del Pi  Alicante</option><option value="Alicante">Alicante</option><option value="Almeria">Almeria</option><option value="Benalmadena">Benalmadena</option><option value="Benalmadena-malaga">Benalmadena-malaga</option><option value="Cambrils">Cambrils</option><option value="Denia">Denia</option><option value="Gran Canaria">Gran Canaria</option><option value="Ibiza">Ibiza</option><option value="La Manga Del Mar Menor">La Manga Del Mar Menor</option><option value="Madrid">Madrid</option><option value="Malaga">Malaga</option><option value="Malaga - Benalmadena Costa">Malaga - Benalmadena Costa</option><option value="Mijas Costa Malaga">Mijas Costa Malaga</option><option value="Mostoles">Mostoles</option><option value="Oropesa Del Mar (castellon)">Oropesa Del Mar (castellon)</option><option value="Pe&amp;ntilde;iscola">Peñiscola</option><option value="Pe&amp;ntilde;iscola(castellon)">Peñiscola(castellon)</option><option value="Salou">Salou</option><option value="Salou Tarragona">Salou Tarragona</option><option value="Santa Cruz De Tenerife">Santa Cruz De Tenerife</option><option value="Tenerife">Tenerife</option><option value="Torrevieja(alicante)">Torrevieja(alicante)</option></optgroup><optgroup unidos="" label="Estados"><option value="Breckenridge">Breckenridge</option><option value="Canyon Lake">Canyon Lake</option><option value="Cleremont">Cleremont</option><option value="Fairfield Bay">Fairfield Bay</option><option value="Fort Lauderdale">Fort Lauderdale</option><option value="Fourt Laudardele">Fourt Laudardele</option><option value="Isla Del Padre">Isla Del Padre</option><option value="Kissimmee">Kissimmee</option><option value="Lake Buena Vista">Lake Buena Vista</option><option value="Las Vegas">Las Vegas</option><option value="Manhattan">Manhattan</option><option value="Miami">Miami</option><option value="Orlando">Orlando</option><option value="Pompano Beach">Pompano Beach</option><option value="Rio Grande">Rio Grande</option><option value="South Padre Island-isla Del Padre">South Padre Island-isla Del Padre</option><option value="Vail">Vail</option><option value="Waikoloa">Waikoloa</option><option value="Weston">Weston</option></optgroup><optgroup label="Jamaica"><option value="Main Street">Main Street</option></optgroup><optgroup label="Martinique"></optgroup><optgroup label="Mexico"><option value="Acapulco">Acapulco</option><option value="Acapulco Diamante">Acapulco Diamante</option><option value="Cabo San Lucas">Cabo San Lucas</option><option value="Cacun">Cacun</option><option value="Canc&amp;uacute;n">Cancún</option><option value="Chihuahua">Chihuahua</option><option value="Ciudad De Mexico">Ciudad De Mexico</option><option value="Coacalco">Coacalco</option><option value="Congregacion Canoas">Congregacion Canoas</option><option value="Cordoba">Cordoba</option><option value="Coyoacan">Coyoacan</option><option value="Cozumel">Cozumel</option><option value="Cuautitlan Izcalli">Cuautitlan Izcalli</option><option value="Cuernavaca">Cuernavaca</option><option value="Distrito Federal">Distrito Federal</option><option value="Durango">Durango</option><option value="Guadalajara">Guadalajara</option><option value="Hermosillo">Hermosillo</option><option value="Irapuato">Irapuato</option><option value="Ixtapa">Ixtapa</option><option value="Ixtapa Zihuatanejo">Ixtapa Zihuatanejo</option><option value="Jalisco">Jalisco</option><option value="Juarez">Juarez</option><option value="Leon">Leon</option><option value="Los Cabos">Los Cabos</option><option value="Manzanillo">Manzanillo</option><option value="Mazatl&amp;aacute;n">Mazatlán</option><option value="MazatlÃ&nbsp;n">MazatlÃ&nbsp;n</option><option value="Mexicali">Mexicali</option><option value="Mexico">Mexico</option><option value="Monterrey">Monterrey</option><option value="Morelia">Morelia</option><option value="P. Pe&amp;ntilde;aco">P. Peñaco</option><option value="Para Ser Usado En Cualquier Desarrollo De Royal Holiday Club">Para Ser Usado En Cualquier Desarrollo De Royal Holiday Club</option><option value="Places In Mexico">Places In Mexico</option><option value="Playa Del Carmen">Playa Del Carmen</option><option value="Puerto Morelos">Puerto Morelos</option><option value="Puerto Pe&amp;ntilde;asco">Puerto Peñasco</option><option value="Puerto Vallarta">Puerto Vallarta</option><option value="Queretaro">Queretaro</option><option value="Rio Lagartos">Rio Lagartos</option><option value="Riviera Maya">Riviera Maya</option><option value="Salamanca">Salamanca</option><option value="San Jose Del Cabo">San Jose Del Cabo</option><option value="San Luis Potosi">San Luis Potosi</option><option value="Santiago N.l.">Santiago N.l.</option><option value="Solidaridad">Solidaridad</option><option value="Talquepaque">Talquepaque</option><option value="Tapachula">Tapachula</option><option value="Tequesquitengo">Tequesquitengo</option><option value="Tequisqiapan">Tequisqiapan</option><option value="Tlalnepantla">Tlalnepantla</option><option value="Varios Destinos">Varios Destinos</option><option value="Varios Sitios">Varios Sitios</option><option value="Venustiano Carranza">Venustiano Carranza</option><option value="Villahermosa">Villahermosa</option><option value="Zapopan">Zapopan</option></optgroup><optgroup dominicana="" label="Republica"><option value="Bavaro">Bavaro</option><option value="Bavaro-punta Cana">Bavaro-punta Cana</option><option value="Bayahibe">Bayahibe</option><option value="Higuey">Higuey</option><option value="Higuey - Punta Cana">Higuey - Punta Cana</option><option value="Playa Bavaro">Playa Bavaro</option><option value="Punta Cana">Punta Cana</option><option value="Punta Cana (playa Bavaro)">Punta Cana (playa Bavaro)</option></optgroup><optgroup label="Uruguay"><option value="Punta Del Este">Punta Del Este</option><option value="Solanas">Solanas</option></optgroup><optgroup label="Venezuela"><option value="Margarita">Margarita</option><option value="Pampatar">Pampatar</option><option value="Pampatar/ Isla Margarita">Pampatar/ Isla Margarita</option><option value="Porlamar">Porlamar</option></optgroup>
                            </datalist>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 when border-gray">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-12 col-lg-12">
                                    <label for="txt__DateVacations">Cuándo?</label>
                                </div>
                                <div class="col-xs-6 col-lg-6">
                                    <input type="date" class="form-control" id="txt__StartDateVacations" placeholder="Llegada">
                                </div>
                                <div class="col-xs-6 col-lg-6">
                                    <input type="date" class="form-control" id="txt__EndDateVacations" placeholder="Salida">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 who border-gray">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Huéspedes?</label>
                            <input type="number" class="form-control" min="1" max="20" placeholder="Cuántas personas">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 search border-gray">
                        <div class="form-group">
                            <a href="/busqueda" class="btn btn-lg btn-block">Buscar</a>
                        </div>
                    </div>
                </div>
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