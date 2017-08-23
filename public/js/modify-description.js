var endPoint = window.location.hostname == 'localhost' ? 'http://0.0.0.0:3000/api/' : 'http://tiempocompartidolb.herokuapp.com/api/';

function setDescription(imageNumber) {
    var id = $('#image-' + imageNumber).val();
    var description = $('#modif-descripcion-' + imageNumber).val();
    $.ajax({
        type: 'PATCH',
        url: `${endPoint}imagenes/${id}`,
        data: {
            descripcion : description
        },
        success: function (data) {
            $('#successEdit-'+imageNumber).show().delay(3000).fadeOut();
            $('#topDescription-'+imageNumber).text(description);
        },
        error: function(xhr, status, error) {
            makeToast('Error','Ha ocurrido un error, vuelva a intentarlo.', 'WARNING');
        }
    })
}
function setFavorito(membresiaId, userId, isFavorito) {
    var method;
    var color;
    var message;
    var toastStatus;
    // Mandar un request a la API sabiendo si el usario tiene favorito a esa membresia
    // Si sí lo tiene: hacer method DELETE
    // Si no lo tiene: hacer method POST
    // Problema: no hay un metodo en la API para obtener la relacion si hay un favorito entre la persona y la membresia 

    if (isFavorito) {
        method = 'DELETE';
        color = 'gray';
        message = 'Eliminado de favoritos';
        toastStatus = 'WARNING';
    } else {
        method = 'POST';
        color = 'red';
        message = 'Agregado a favoritos';
        toastStatus = 'SUCCESS';
    }

    $.ajax({
        type: method,
        url: `${endPoint}People/${userId}/favoritos`,
        data: {
            idMembresia : membresiaId
        },
        success: function (data) {
            console.log(color);
            $('favoritos-heart').css('color', color);
            makeToast('Favorito', message, toastStatus);
        },
        error: function(xhr, status, error) {
            makeToast('Error','Ha ocurrido un error, vuelva a intentarlo.', 'WARNING');
        }
    });
    
}
function setLocation($ACCESS_TOKEN) {
    
    $.ajax({
        url: `${endPoint}Membresia/${$('#membresiaId').val()}`,
        type: 'GET',
        dataType: 'json',        
        success: function (data) {
            var method = data.ubicacion == null ? 'POST' : 'PUT';

            $.ajax({
                url: `${endPoint}Membresia/${$('#membresiaId').val()}/ubicacion`,
                type: method,
                data: {
                    lat : $('#us2-lat').val().toString(),
                    lng : $('#us2-lon').val().toString(),
                    descripcion : $('#us2-address').val().toString(),
                    ciudad : $('#us2-city').val().toString()
                },
                success: function (data) {
                    $('#successLocationChanged').show().delay(3000).fadeOut();
                },
                error: function(xhr, status, error) {
                    makeToast('Error','Ha ocurrido un error, vuelva a intentarlo.', 'WARNING');
                }
            });
        },
        error: function(xhr, status, error) {
            makeToast('Error','Ha ocurrido un error, vuelva a intentarlo.', 'WARNING');
        }
    });
}

function publish(membresiaId, statusName) {
    $.ajax({
        url: `${endPoint}Membresia/${membresiaId}`,
        type: 'PATCH',
        dataType: 'json',
        data: {
            status: statusName            
        },
        success: function (data) {
            makeToast('Cambio de status','Estatus actualizado a ' + statusName, 'INFO');
        },
        error: function(xhr, status, error) {
            makeToast('Error','Ha ocurrido un error, vuelva a intentarlo.', 'WARNING')
        }
    });
}
