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
    <a  href="">
        <i class="fa fa-2x fa-map pull-right"
            ng-click="membresiaUbicacion(membresia)">
        </i>
    </a>
    <a  href="">
        <i class="fa fa-2x fa-img pull-right"
            ng-click="membresiaAfiliaciones(membresia)">
        </i>
    </a>
    <a  href="">
        <i class="fa fa-2x fa-remove pull-right"
            ng-click="removeMembresia_(membresia)">
        </i>
    </a>
    <a  href="/edit-membresia/{{ $membresia->id }}">
        <i class="fa fa-2x fa-edit pull-right"></i>
    </a>
    <a  href="">
        <i class="fa fa-2x fa-pause pull-right"
            ng-click="pauseMembresia(membresia)">
        </i>
    </a>
    <a  href="">
        <i class="fa fa-2x fa-play pull-right"
            ng-click="playMembresia(membresia)">
        </i>
    </a>