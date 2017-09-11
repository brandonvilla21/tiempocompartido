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
    getFavoritosByIdUser(userId, function(error, favoritos) {
        favoritos.forEach(function(favorito) {
            // Es favorito y se debe eliminar
            if(favorito.idMembresia == membresiaId) {
                $.ajax({
                    type: 'DELETE',
                    url: `${endPoint}People/${userId}/favoritos/${favorito.id}`,
                    success: function (data) {
                        console.log(data);
                        makeToast('Favorito', 'Ha sido quitado de favoritos', 'SUCCESS');
                    },
                    error: function(xhr, status, error) {
                        makeToast('Error','Ha ocurrido un error, vuelva a intentarlo.', 'WARNING');
                    }
                });
                break;
            } else { // No es favorito y se debe eliminar
                $.ajax({
                    type: 'POST',
                    url: `${endPoint}People/${userId}/favoritos`,
                    success: function (data) {
                        console.log(data);
                        makeToast('Favorito', 'Guardado en favoritos', 'SUCCESS');
                    },
                    error: function(xhr, status, error) {
                        makeToast('Error','Ha ocurrido un error, vuelva a intentarlo.', 'WARNING');
                    }
                });
                break;
            }
        });
    });
    // if (isFavorito) {
    //     method = 'DELETE';
    //     color = 'gray';
    //     message = 'Eliminado de favoritos';
    //     toastStatus = 'WARNING';
    // } else {
    //     method = 'POST';
    //     color = 'red';
    //     message = 'Agregado a favoritos';
    //     toastStatus = 'SUCCESS';
    // }

    // $.ajax({
    //     type: method,
    //     url: `${endPoint}People/${userId}/favoritos`,
    //     data: {
    //         idMembresia : membresiaId
    //     },
    //     success: function (data) {
    //         console.log(color);
    //         $('favoritos-heart').css('color', color);
    //         makeToast('Favorito', message, toastStatus);
    //     },
    //     error: function(xhr, status, error) {
    //         makeToast('Error','Ha ocurrido un error, vuelva a intentarlo.', 'WARNING');
    //     }
    // });
    
}

function getFavoritosByIdUser(userId, cb) {
    $.ajax({
        type: 'GET',
        url: `${endPoint}/People/${userId}/favoritos`,
        success: function (data) {
            return cb(null, data);
        },
        error: function(xhr, status, error) {
            return cb(error);
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

function setLocalidadesUser() {
    console.log('setLocalidades');
    $('.ciudadNombre-select').remove();
    var paisId = $('select[name=pais]').val()
    $.ajax({
        url: `${endPoint}localidades/findLocalidades/${paisId}`,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            console.log('Datos: ',data);
            var selectTag = $("<select id='ciudad' name='ciudad' class='form-control ciudadNombre-select'></select>");
            data.forEach(function(city) {
                selectTag.append(`<option value="${city.nombre}" >${city.nombre}</option>`);
            });
            $('.ciudadNombre-user-select').append(selectTag);
        },
        error: function(xhr, status, error) {
            console.log('Error: ', error);
        }
    });
}

function setLocalidadesMembresia() {
    console.log('setLocalidadesMem');        
    $('.localidadNombre-select').remove();
    var paisId = $('select[name=paisNombre]').val()
    $.ajax({
        url: `${endPoint}localidades/findLocalidades/${paisId}`,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            var selectTag = $("<select id='localidadNombre' name='localidadNombre' class='form-control localidadNombre-select'></select>");
            data.forEach(function(city) {
                selectTag.append(`<option value="${city.nombre}" >${city.nombre}</option>`);
            });
            $('.localidad-select').append(selectTag);
        },
        error: function(xhr, status, error) {
            console.log('Error: ', error);
        }
    });
}
function setLocalidadesBusqueda() {
    console.log('setLocalidades');
    $('.ciudadBusqueda-select').remove();
    $('#cmb__City').remove();
    var paisId = $('select[name=pais]').val()
    $.ajax({
        url: `${endPoint}localidades/findLocalidades/${paisId}`,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            var labelCity = $(`<label for="cmb__City" id="cmb__City">Ciudad</label>`);
            var selectTag = $(`
                <select id="ciudad" name="ciudad" class="form-control ciudadBusqueda-select"></select>
            `);
            data.forEach(function(city) {
                selectTag.append(`<option value="${city.nombre}" >${city.nombre}</option>`);
            });
            $('.ciudad-busqueda').append(labelCity);
            $('.ciudad-busqueda').append(selectTag);
        },
        error: function(xhr, status, error) {
            console.log('Error: ', error);
        }
    });
}

function searchMembresias() {
    var paisId = $('#pais').val();
    var ciudad = $('#ciudad').val();
    var busco = $('#busco').val();
    var huespedes = $('#huespedes').val();
    var pais;


        
    getBusqueda(paisId, ciudad, busco, huespedes, function(error, membresias) {
        console.log(membresias);
        var card;
        $('.resultados-content').remove();
        var resulContent = $('<div class="resultados-content row" ></div>');
        $('.membresias-result').append(resulContent);
        
        membresias.forEach(function(membresia) {
            card = $(`
                <div class="col-md-6">
                    <div class="card" style="width: 25rem;">
                        <img style="width:100%;"class="card-img-top" src="uploads/membresias-images/thumbs/${membresia.imagenes[0].src}" alt="imagen">
                        <div class="card-block">
                            <h4 class="card-title">${membresia.titulo}</h4>
                            <p class="card-text">${membresia.descripcion}</p>
                            <a href="/membresia/${membresia.titulo}/${membresia.id}" class="btn btn-primary">Ver membresia</a>
                        </div>
                    </div>
                </div>
            `);
            $('.resultados-content').append(card);
        });

    });
    
}

function findPaisById (paisId, cb) {
    $.ajax({
        url: `${endPoint}paises/${paisId}`,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            return cb(null, data);
        },
        error: function(xhr, status, error) {
            return cb(error);
        }
    });    
}

function getBusqueda(paisId, ciudad, rentaventa, huespedes, cb) {
    var ventaVal = (rentaventa == 'VENTA') ? true : false;
    var rentaVal = (rentaventa == 'RENTA') ? true : false;
    $.ajax({
        // url: `${endPoint}Membresia/busqueda/${pais}/${ciudad}/${rentaventa}/${huespedes}`,
        url: `${endPoint}Membresia/?filter[where][paisNombre][like]=${paisId}&filter[where][localidadNombre][like]=${ciudad}&filter[where][venta]=${ventaVal}&filter[where][renta]=${rentaVal}&filter[where][maxOcupantes][gt]=${huespedes}`,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            console.log(`${endPoint}Membresia/busqueda/${pais}/${ciudad}/${rentaventa}/${huespedes}`);
            return cb(null, data)
        },
        error: function(xhr, status, error) {
            return(error);
        }
    }); 
}

    
var map;
function initMap() {
    map = new google.maps.Map(document.getElementById('mapSearch'), {
        center: {lat: 19.436088918814285, lng: -99.1954038777344},
        zoom: 8
    });
}
   
