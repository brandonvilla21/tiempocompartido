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

    <div class="AppSearch">
        <div class="row">
            <div class="col-xs-12 col-md-0 col-lg-1 no-padding"> </div>
            <div class="col-xs-12 col-md-5 col-lg-4 no-padding">
                <div class="AppSearch__Filters">
                    <h1 class="title margin-bottom">
                        Búsqueda
                    </h1>
                    <div class="row">
                        <div class="col-xs-12 col-lg-12">
                            <form id="busquedaForm" role="form">
                                <div class="row margin-bottom padding">
                                    <div class="col-xs-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="cmb__Country">Dónde?</label>
                                            <input type="text" class="form-control"  ng-model="busqueda.destino" id="cmb__Country" placeholder="Destino, Ciudad" list="locations">
                                            <datalist id="locations">

        <optgroup label="Argentina"><option value="Bariloche">Bariloche</option><option value="Buenos Aires">Buenos Aires</option><option value="Cabalango">Cabalango</option><option value="Capital Federal">Capital Federal</option><option value="Carlos Paz">Carlos Paz</option><option value="Caviahue">Caviahue</option><option value="Chapadmalal">Chapadmalal</option><option value="Costa Del Este">Costa Del Este</option><option value="Las Grutas">Las Grutas</option><option value="Las Le&amp;ntilde;as">Las Leñas</option><option value="Maipu">Maipu</option><option value="Malargue">Malargue</option><option value="Mar Del Plata">Mar Del Plata</option><option value="Pinamar">Pinamar</option><option value="San Bernardo">San Bernardo</option><option value="San Carlos De Bariloche">San Carlos De Bariloche</option><option value="San Carolos De Bariloche">San Carolos De Bariloche</option><option value="San Martin De Los Andes">San Martin De Los Andes</option><option value="Villa Carlos Paz">Villa Carlos Paz</option><option value="Villa La Angostura">Villa La Angostura</option></optgroup><optgroup label="Aruba"><option value="Aruba">Aruba</option><option value="Aruba-oranjestad">Aruba-oranjestad</option><option value="Eagle Beach">Eagle Beach</option><option value="Oranjestad">Oranjestad</option></optgroup><optgroup label="Belice"><option value="Cayo Ambergris">Cayo Ambergris</option></optgroup><optgroup label="Brasil"><option value="Buzios">Buzios</option><option value="Fortaleza">Fortaleza</option><option value="Porto Belo">Porto Belo</option></optgroup><optgroup label="Canada"><option value="Whistler">Whistler</option></optgroup><optgroup label="Chile"><option value="Con Con">Con Con</option><option value="Pucon">Pucon</option><option value="Re&amp;ntilde;aca">Reñaca</option><option value="Santiago">Santiago</option><option value="Vi&amp;ntilde;a Del Mar">Viña Del Mar</option><option value="Villarrica">Villarrica</option></optgroup><optgroup label="Colombia"><option value="Baq">Baq</option><option value="Bogota">Bogota</option><option value="Cartagena">Cartagena</option><option value="Santa Marta">Santa Marta</option></optgroup><optgroup rica="" label="Costa"><option value="10 Minutos De El Coco">10 Minutos De El Coco</option><option value="Alajuela">Alajuela</option><option value="Carrillo">Carrillo</option><option value="El Roble">El Roble</option><option value="El Roble Puntarenas">El Roble Puntarenas</option><option value="Guanacaste">Guanacaste</option><option value="La Cruz">La Cruz</option><option value="Liberia">Liberia</option><option value="Nicoya">Nicoya</option><option value="Playa Hermosa">Playa Hermosa</option><option value="Playas Del Coco">Playas Del Coco</option><option value="Puntarenas">Puntarenas</option><option value="Santa Cruz Gte.">Santa Cruz Gte.</option></optgroup><optgroup label="Ecuador"><option value="Gal&amp;aacute;pagos">Galápagos</option><option value="Salinas">Salinas</option></optgroup><optgroup label="España"><option value="Alfas Del Pi  Alicante">Alfas Del Pi  Alicante</option><option value="Alicante">Alicante</option><option value="Almeria">Almeria</option><option value="Benalmadena">Benalmadena</option><option value="Benalmadena-malaga">Benalmadena-malaga</option><option value="Cambrils">Cambrils</option><option value="Denia">Denia</option><option value="Gran Canaria">Gran Canaria</option><option value="Ibiza">Ibiza</option><option value="La Manga Del Mar Menor">La Manga Del Mar Menor</option><option value="Madrid">Madrid</option><option value="Malaga">Malaga</option><option value="Malaga - Benalmadena Costa">Malaga - Benalmadena Costa</option><option value="Mijas Costa Malaga">Mijas Costa Malaga</option><option value="Mostoles">Mostoles</option><option value="Oropesa Del Mar (castellon)">Oropesa Del Mar (castellon)</option><option value="Pe&amp;ntilde;iscola">Peñiscola</option><option value="Pe&amp;ntilde;iscola(castellon)">Peñiscola(castellon)</option><option value="Salou">Salou</option><option value="Salou Tarragona">Salou Tarragona</option><option value="Santa Cruz De Tenerife">Santa Cruz De Tenerife</option><option value="Tenerife">Tenerife</option><option value="Torrevieja(alicante)">Torrevieja(alicante)</option></optgroup><optgroup unidos="" label="Estados"><option value="Breckenridge">Breckenridge</option><option value="Canyon Lake">Canyon Lake</option><option value="Cleremont">Cleremont</option><option value="Fairfield Bay">Fairfield Bay</option><option value="Fort Lauderdale">Fort Lauderdale</option><option value="Fourt Laudardele">Fourt Laudardele</option><option value="Isla Del Padre">Isla Del Padre</option><option value="Kissimmee">Kissimmee</option><option value="Lake Buena Vista">Lake Buena Vista</option><option value="Las Vegas">Las Vegas</option><option value="Manhattan">Manhattan</option><option value="Miami">Miami</option><option value="Orlando">Orlando</option><option value="Pompano Beach">Pompano Beach</option><option value="Rio Grande">Rio Grande</option><option value="South Padre Island-isla Del Padre">South Padre Island-isla Del Padre</option><option value="Vail">Vail</option><option value="Waikoloa">Waikoloa</option><option value="Weston">Weston</option></optgroup><optgroup label="Jamaica"><option value="Main Street">Main Street</option></optgroup><optgroup label="Martinique"></optgroup><optgroup label="Mexico"><option value="Acapulco">Acapulco</option><option value="Acapulco Diamante">Acapulco Diamante</option><option value="Cabo San Lucas">Cabo San Lucas</option><option value="Cacun">Cacun</option><option value="Canc&amp;uacute;n">Cancún</option><option value="Chihuahua">Chihuahua</option><option value="Ciudad De Mexico">Ciudad De Mexico</option><option value="Coacalco">Coacalco</option><option value="Congregacion Canoas">Congregacion Canoas</option><option value="Cordoba">Cordoba</option><option value="Coyoacan">Coyoacan</option><option value="Cozumel">Cozumel</option><option value="Cuautitlan Izcalli">Cuautitlan Izcalli</option><option value="Cuernavaca">Cuernavaca</option><option value="Distrito Federal">Distrito Federal</option><option value="Durango">Durango</option><option value="Guadalajara">Guadalajara</option><option value="Hermosillo">Hermosillo</option><option value="Irapuato">Irapuato</option><option value="Ixtapa">Ixtapa</option><option value="Ixtapa Zihuatanejo">Ixtapa Zihuatanejo</option><option value="Jalisco">Jalisco</option><option value="Juarez">Juarez</option><option value="Leon">Leon</option><option value="Los Cabos">Los Cabos</option><option value="Manzanillo">Manzanillo</option><option value="Mazatl&amp;aacute;n">Mazatlán</option><option value="MazatlÃ&nbsp;n">MazatlÃ&nbsp;n</option><option value="Mexicali">Mexicali</option><option value="Mexico">Mexico</option><option value="Monterrey">Monterrey</option><option value="Morelia">Morelia</option><option value="P. Pe&amp;ntilde;aco">P. Peñaco</option><option value="Para Ser Usado En Cualquier Desarrollo De Royal Holiday Club">Para Ser Usado En Cualquier Desarrollo De Royal Holiday Club</option><option value="Places In Mexico">Places In Mexico</option><option value="Playa Del Carmen">Playa Del Carmen</option><option value="Puerto Morelos">Puerto Morelos</option><option value="Puerto Pe&amp;ntilde;asco">Puerto Peñasco</option><option value="Puerto Vallarta">Puerto Vallarta</option><option value="Queretaro">Queretaro</option><option value="Rio Lagartos">Rio Lagartos</option><option value="Riviera Maya">Riviera Maya</option><option value="Salamanca">Salamanca</option><option value="San Jose Del Cabo">San Jose Del Cabo</option><option value="San Luis Potosi">San Luis Potosi</option><option value="Santiago N.l.">Santiago N.l.</option><option value="Solidaridad">Solidaridad</option><option value="Talquepaque">Talquepaque</option><option value="Tapachula">Tapachula</option><option value="Tequesquitengo">Tequesquitengo</option><option value="Tequisqiapan">Tequisqiapan</option><option value="Tlalnepantla">Tlalnepantla</option><option value="Varios Destinos">Varios Destinos</option><option value="Varios Sitios">Varios Sitios</option><option value="Venustiano Carranza">Venustiano Carranza</option><option value="Villahermosa">Villahermosa</option><option value="Zapopan">Zapopan</option></optgroup><optgroup dominicana="" label="Republica"><option value="Bavaro">Bavaro</option><option value="Bavaro-punta Cana">Bavaro-punta Cana</option><option value="Bayahibe">Bayahibe</option><option value="Higuey">Higuey</option><option value="Higuey - Punta Cana">Higuey - Punta Cana</option><option value="Playa Bavaro">Playa Bavaro</option><option value="Punta Cana">Punta Cana</option><option value="Punta Cana (playa Bavaro)">Punta Cana (playa Bavaro)</option></optgroup><optgroup label="Uruguay"><option value="Punta Del Este">Punta Del Este</option><option value="Solanas">Solanas</option></optgroup><optgroup label="Venezuela"><option value="Margarita">Margarita</option><option value="Pampatar">Pampatar</option><option value="Pampatar/ Isla Margarita">Pampatar/ Isla Margarita</option><option value="Porlamar">Porlamar</option></optgroup>
        
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="">Busco en</label>
                                            <input class="form-control" ng-model="busqueda.tipo" placeholder="Renta o venta" list="tipo">
                                            <datalist id="tipo">
                                                <option value="RENTA">Renta</option>
                                                <option value="VENTA">Venta</option>
                                            </datalist>
                                        </div>         
                                    </div>
                                    <div class="col-xs-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="">Llegando</label>
                                            <input type="date" class="form-control" ng-model="busqueda.llegada" id="txt__StartDateVacations" placeholder="Llegada">
                                        </div>         
                                    </div>
                                    <div class="col-xs-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="">Saliendo</label>
                                            <input type="date" class="form-control" ng-model="busqueda.salida" id="txt__EndDateVacations" placeholder="Salida">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="">Huéspedes</label>
                                            <input type="number" class="form-control" ng-model="busqueda.maxOcupantes" placeholder="Huéspedes" min="1" max="30">
                                        </div>  
                                    </div>
                                    <div class="col-xs-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="">Forma de pago</label>
                                            <select class="form-control" id="" ng-model="busqueda.metodoPago">
                                                <option value="EFECTIVO">Efectivo</option>
                                                <option value="CREDITO-DEBITO,CHEQUE">Tarjeta Crédito/Débito</option>
                                                <option value="TRANSFERENCIA">Transferencia</option>
                                                <option value="CHEQUE">Cheque</option>
                                            </select>
                                        </div>  
                                    </div>
                                    <!--
                                    <div class="col-xs-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="">Precio Mínimo</label>
                                            <input type="number" step="1000" min="1000" class="form-control" ng-model="busqueda.precioMin" placeholder="Precio Minimo">
                                        </div>         
                                    </div>
                                    <div class="col-xs-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="">Precio Máximo</label>
                                            <input type="number" step="1000" min="1000" class="form-control" ng-model="busqueda.precioMax" placeholder="Precio Máximo">
                                        </div>
                                    </div>-->
                                    <div class="col-xs-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="">Habitaciones</label>
                                            <input type="number" class="form-control" ng-model="busqueda.dormitorios" placeholder="Número de habitaciones" min="1" max="20">
                                        </div>         
                                    </div>
                                    <div class="col-xs-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="">Camas</label>
                                            <input type="number" class="form-control" ng-model="busqueda.camas" placeholder="Número de camas" min="1" max="30">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="">Baños</label>
                                            <input type="number" class="form-control" ng-model="busqueda.banios" placeholder="Número de baños" min="1" max="30">
                                        </div>
                                    </div>
                                    <!--
                                    <div class="AppSearch__ExtraFilters">
                                        <div class="col-xs-12 col-lg-12">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Aeropuerto cercano?
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-lg-12">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Central de Autobuses cercana?
                                                </label>
                                            </div>
                                        </div>
                                    </div>-->
                                    <div class="col-xs-12 col-lg-12">
                                        <button type="button" class="width-35 pull-right btn btn-primary" ng-click="doSearch(busqueda)">
                                            <i class="ace-icon fa fa-search"></i>
                                            Buscar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row margin-bottom padding">
                        <div class="col-xs-12 col-lg-12">
                            <h2 class="title margin-bottom">
                                Resultados
                            </h2>
                            <div>
                                <div class="media" ng-repeat="membresia in resultados">
                                <div class="media-left">
                                    <a href="#">
                                    <img class="media-object" src="..." alt="...">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">membresia.clubNombre</h4>
                                    membresia.descripcion
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-7 col-lg-7 no-padding">
                <div class="AppSearch__Map">
                    <div id="map_search" class="embed-responsive-item" style="height:100vh; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>
@endsection