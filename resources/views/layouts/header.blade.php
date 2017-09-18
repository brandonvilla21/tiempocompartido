<header class="encabezado navbar-fixed-top" role="banner" id="encabezado" >
    <div class="container">
        <a href="/" class="logo text-white" style="text-decoration:none">
            <span class="hidden-md-up"><figure class="img"><img src="assets/img/logo_nb.png" alt="www.tiempocompartido.com"></figure></span>
            <span class="hidden-md-down"><figure class="img"><img src="assets/img/logo_nw.png" alt="www.tiempocompartido.com"></figure></span>
        </a>
        <button type="button" class="boton-buscar hidden-md-up" data-toggle="collapse" data-target="#menu-principal" aria-expanded="false">
            <i class="fa fa-bars" aria-hidden="true"></i></button>
        <nav id="menu-principal" class="collapse">
        @if(Session::has('SUPER_USER'))
            <ul>
                <li><a href="/promocion/create" class="border-rigth"><i  class="fa fa-star"></i> Agregar promoción</a></li>
                <li><a href="/logout"><i class="fa fa-sign-out"></i> Cerrar sesión</a></li>             
            </ul>  
        @else
            <ul>
                @if(Session::has('EMAIL'))
                    <li><a class="border-rigth">{{ Session::get('NAME') }}</a></li>
                @endif
                <li><a href="/busqueda" class="border-rigth"><i  class="fa fa-search"></i> Búsqueda</a></li>
                <li><a href="/promociones" class="border-rigth"><i  class="fa fa-star"></i> Promociones</a></li>
                <li><a href="/listados" class="border-rigth"><i  class="fa fa-list"></i> Listados</a></li>
                @if(!Session::has('ACCESS_TOKEN'))
                    <li><a href="/login" class="border-rigth"> Ingresa </a></li>
                    <li><a href="/signup" class="border-rigth">Regístrate</a></li>
                @else
                    <li><a href="/mi-cuenta" class="border-rigth">Mi cuenta <span class="caret"></span></a></li>
                    <li><a href="/logout"><i class="fa fa-sign-out"></i> Cerrar sesión</a></li>
                @endif    
            </ul>
        @endif
        </nav>
    </div>
</header>
<div class="texto-encabezado text-xs-center">
    <div class="container">
        <h1 class="display-4 wow bounceIn">¡Vacaciones Increibles!</h1>
        <a  data-scroll href="#inicia" class="btn btn-primary btn-lg">Comienza ahora</a>
    </div>
</div>
<div class="flecha-bajar text-xs-center">
    <a data-scroll href="#inicia"> <i class="fa fa-angle-down" aria-hidden="true"></i></a>
</div>