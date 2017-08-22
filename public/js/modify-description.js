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
            alert('Ha ocurrido un error, vuelva a intentarlo.')
        }
    })
}
function setFavorito(membresiaId, userId, isFavorito) {
    var method;
    var color;
    // Mandar un request a la API sabiendo si el usario tiene favorito a esa membresia
    // Si sí lo tiene: hacer method DELETE
    // Si no lo tiene: hacer method POST
    // Problema: no hay un metodo en la API para obtener la relacion si hay un favorito entre la persona y la membresia 

    if (isFavorito) {
        method = 'DELETE';
        color = 'gray';
    } else {
        method = 'POST';
        color = 'red';
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
            alert('Success');
        },
        error: function(xhr, status, error) {
            alert('Ha ocurrido un error, vuelva a intentarlo.')
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
                    alert('Ha ocurrido un error, vuelva a intentarlo.')
                }
            });
        },
        error: function(xhr, status, error) {
            alert('Ha ocurrido un error, vuelva a intentarlo.')
        }
    });

    
}