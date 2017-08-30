@extends('layouts.master')
@section('content')
        <section class="ruta py-1" id="inicia">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-xs-right">
                        <a href="/">Inicio</a> » <a href="/mi-cuenta">Mi cuenta</a> » Mis membresias
                    </div>
                </div>
            </div>
        </section>
        <section class="py-1">   
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-5 col-xl-4">
                        @include('layouts.menu-cuenta')
                    </div>
                    <div class="col-md-7 col-xl-8 padding">
                        <div class="alert alert-warning">
                            <strong>¡Promociona tu membresia!</strong> </br>
                            Adicionalmente Aparecera Listado En La Seccion Especial Membresias Destacadas De Nuestra Pagina Principal.</br>
                            Ademas, Tu Publicacion Sera Listada en La Parte Superior De La Pagina De Resultados Que Los Visitantes Obtengan Buscando Inventario!.</br>
                            Plan A 3 Meses. Recomendado Para Ofertas.$199 Pesos Mx+Imp.</br>
                            Plan A 6 Meses. Recomendado Para Renta De Semanas, Intercambios Y Ventas De Inventario De Alta Demanda.$359 Pesos Mx+Imp.</br>
                            Plan A 12 Meses Recomendado Para Reventas De Menor Demanda,$599 Pesos Mx+Imp.</br>
                            Para Contratar Este Nuevo Servicio Clic En El Boton Destacar Membresia</br>
                        </div>
                        @foreach($membresias as $index => $membresia)
                            <div class="card">
                                <div class="row">
                                    <div class="col-md-4">
                                        @if ( App\User::getPrincipalImage(getClient(), $membresia->id) != null)
                                            <img src="uploads/membresias-images/thumbs/{{ App\User::getPrincipalImage(getClient(), $membresia->id)->src }}" class="card-image-desktop">
                                            <img src="uploads/membresias-images/thumbs/{{ App\User::getPrincipalImage(getClient(), $membresia->id)->src }}" class="card-image-mobile w-100">
                                        @else 
                                            <img src="assets/img/sin-imagen.jpg" class="card-image-desktop">
                                            <img src="assets/img/sin-imagen.jpg" class="card-image-mobile w-100">
                                        @endif
                                    </div>
                                        <div class="card-image-mobile col-md-8 px-3"> 
                                            <div class="card-block" style="padding-left: 0; padding-right:0;">
                                                <h4 class="card-title">{{ $membresia->titulo }}</h4>
                                                <p class="card-text">{{ $membresia->descripcion }}</p>
                                                <hr>
                                                <div>
                                                    @include('layouts.membresia-opciones')
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-image-desktop col-md-8 px-3"> 
                                            <div class="card-block pl-3">
                                                <h4 class="card-title">{{ $membresia->titulo }}</h4>
                                                <p class="card-text">{{ $membresia->descripcion }}</p>
                                                <hr>
                                                <div>
                                                    @include('layouts.membresia-opciones')
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalLabel-{{$index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">¡Mejora tu cuenta!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                                                <input type="hidden" name="cmd" value="_s-xclick">
                                                <input type="hidden" name="hosted_button_id" value="DC3VKGYPRRQFS">
                                                <input type="hidden" name="custom" value="{{$membresia->id}}">
                                                <table>
                                                    <tr><td>
                                                        <input type="hidden" name="on0" value="Planes y Precios">Planes y Precios
                                                    </td></tr><tr><td>
                                                    <select name="os0">
                                                        <option value="3 Meses">3 Meses $199.00</option>
                                                        <option value="6 Meses">6 Meses $359.00</option>
                                                        <option value="12 Meses">12 Meses $599.00</option>
                                                    </select> </td></tr>
                                                </table>
                                                <input type="hidden" name="currency_code" value="MXN">
                                                <input type="hidden" name="return" value="http://www.tiempocompartido.com/index.php"> 
                                                <input type="hidden" name="rm" value="2"> 
                                                <input type="hidden" name="notify_url" value="http://www.tiempocompartido.com/ipn_success.php"> 
                                                <input type="image" src="https://www.paypal.com/es_XC/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en línea.">
                                                <img alt="" border="0" src="https://www.paypal.com/es_XC/i/scr/pixel.gif" width="1" height="1">
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    <a href="/new-membresia" class="width-35 pull-right btn btn-success" ng-click="newMembresia()">
                        <i class="ace-icon fa fa-plus"></i>
                            Crea nueva publicación
                    </a>
                    </div>
                    
                </div>
            </div>
        </section>
@endsection