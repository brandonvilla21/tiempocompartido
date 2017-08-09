@if($flash = session('error'))
    <div class="alert alert-danger" role="alert">
        <strong>Ha ocurido un error: </strong> {{ $flash }}
    </div>
@elseif($flash = session('message'))
    <div class="alert alert-success" role="alert">
        <strong>¡Operacion satisfactoria! </strong> {{ $flash }}
    </div>
@endif