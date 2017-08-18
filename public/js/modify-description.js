function setDescription(imageNumber) {
    var id = $('#image-' + imageNumber).val();
    var description = $('#modif-descripcion-' + imageNumber).val();
    $.ajax({
        type: 'PATCH',
        url: `http://0.0.0.0:3000/api/imagenes/${id}`,
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