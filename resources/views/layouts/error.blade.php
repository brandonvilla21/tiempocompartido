@if($flash = session('error'))
    <div class="alert alert-danger" role="alert">
    <strong>Ha ocurido un error: </strong> {{ $flash }}
    </div>
@endif