@extends('layouts.master')
@section('content')
    
    <section class="px-5">
        <div class="container mt-3 mb-3">
            <h1> Agrega imágenes a tu promoción</h1>
            <hr>

            {{Form::open(['route' => 'saveImagePromocion', 'files' => true, 'onsubmit' => 'envio_form()', 'name' => 'form_imagen'])}}
                <input name="promocionTitulo" type="hidden" value="{{ slugify($promocion->titulo) }}"/>
                <input name="promocionId" type="hidden" value="{{ $promocion->id }}"/>
                <div class="form-group">
                    <div class="row">
                        {{Form::label('agregar_imagen', 'Agregar imagen',['class' => 'col-sm-3 control-label no-padding-right'])}}
                        <div class="col-sm-5">
                            {{Form::file('images[]', ['class' => 'form-control', 'id' => 'inputFiles', 'multiple' => true])}} 
                        </div>
                        <div class="col-sm-4">
                            {{Form::submit('Guardar', ['class' => 'width-35 pull-right btn btn-primary btn-block'])}}
                        </div>
                    </div>
                </div>
            {{Form::close()}}
        </div>
        {{--  Aun falta mostrar las imagenes cuando la promocion ya tiene imagenes guardadas  --}}
        {{--  @if(isset($promocion->imagenes[0]))
            <div id="mis-imagenes" class="container mb-3 pt-3">
                <div class="row">
                    <div class="col-md-6 pb-1">
                        <h2 class="">Imágenes de la promoción</h2>
                    </div>
                    <div class="col-md-3 offset-md-3">
                        <a href="" class="btn btn-success btn-block">Reorganizar imagenes</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    @foreach($promocion->imagenes as $key => $image)
                        @if($image->tipo == 'thumb')
                            <div class="text-center col-md-4 col-sm-6 mb-1">
                                <input id="image-{{ $key }}" type="hidden" value="{{ pv($image, 'id')}}">                            
                                <div class="thumbnail">
                                    <a href=""  data-toggle="modal" data-target=".bd-example-modal-md-{{ $key }}">
                                        <img style="width:100%;" src="uploads/promociones/thumbs/{{ $image->src }}"/> 
                                    </a>
                                    <div id="topDescription-{{$key}}" class="caption gradient pb-1">
                                        {{ str_limit( pv($image, 'descripcion'), 50)}}
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade bd-example-modal-md-{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #7fb2d4; display: flex;">
                                            <h5 class="modal-title" style="width:100%;">{{str_limit(pv($image, 'descripcion'), 25)}}</h5>
                                            <div class="pull-right" style="width:100%;">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                         <div class="modal-body">
                                            <img style="width:100%;"src="uploads/promociones/{{ $image->src }}"/>                                         
                                            <div class="mt-1">
                                                <label for="descripcion">Descripción de la imagen</label>
                                                <input id="modif-descripcion-{{$key}}"class="form-control" type="text" value="{{ pv($image, 'descripcion')}}" placeholder="Agregue una descripción...">
                                            </div>
                                            <div id="successEdit-{{$key}}" class="alert alert-success mt-1" style="display:none;" role="alert">
                                                <strong>Cambios guardados!</strong> Se han guardado los cambios correctamente.
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" onclick="setDescription({{$key}})">Guardar cambios</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif  --}}
    </section>
@endsection