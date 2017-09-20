$(document).ready(function() {
    var pathname = window.location.pathname;
    if (pathname == '/') {
        $('.bienvenidos').css('height', '100vh');
        $('.ir-arriba').attr("href", "#encabezado");
        $('.ir-arriba').append('<i class="fa fa-arrow-circle-up" aria-hidden="true"> </i>');
    } else  {
        $('.bienvenidos').css('height', '50vh');
        $('.ir-arriba').attr("href", "javascript:history.back()");
        $('.ir-arriba').append('<i class="fa fa-arrow-circle-left" aria-hidden="true"> </i>');
    }
});