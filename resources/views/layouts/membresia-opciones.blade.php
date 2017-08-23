    <a  href="/guardar-imagenes/{{ $membresia->id }}">
        <i class="fa fa-2x fa-image pull-right"
            ng-click="membresiaImagenes(membresia)">
        </i>
    </a>
    <a  href="">
        <i class="fa fa-2x fa-star pull-right"
            ng-click="membresiaImagenes(membresia)">
        </i>
    </a>
    <a  href="/mi-cuenta/membresia-ubicacion/{{ $membresia->id }}">
        <i class="fa fa-2x fa-map pull-right"
            ng-click="membresiaUbicacion(membresia)">
        </i>
    </a>
    <a  href="">
        <i class="fa fa-2x fa-img pull-right"
            ng-click="membresiaAfiliaciones(membresia)">
        </i>
    </a>
    <a  style="cursor:pointer;color:#0275d8;"  onclick="publish('{{ $membresia->id }}', 'BAJA')">
        <i class="fa fa-2x fa-remove pull-right">
        </i>
    </a>
    <a  href="/edit-membresia/{{ $membresia->id }}">
        <i class="fa fa-2x fa-edit pull-right"></i>
    </a>
    <a  style="cursor:pointer;color:#0275d8;" onclick="publish('{{ $membresia->id }}', 'DETENIDO')">
        <i class="fa fa-2x fa-pause pull-right">
        </i>
    </a>
    <a  style="cursor:pointer;color:#0275d8;" onclick="publish('{{ $membresia->id }}', 'PUBLICADO')">
        <i class="fa fa-2x fa-play pull-right">
        </i>
    </a>