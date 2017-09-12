@extends('layouts.master')
@section('content')
    <section class="ruta py-1" id="inicia">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-xs-right">
                    <a href="/">Inicio</a>
                </div>
            </div>
        </div>
    </section>
    <div class="container pt-3 pb-3">
        <div class="row">
            <div class="col-md-12">
                <h1 class="tiempo-title display-4">Búsqueda</h1>
                <hr>
            </div>
            <div class="col-md-5">

                <form id="busquedaForm" role="form">
                    
                    <div class="form-group">
                        <label for="cmb__Country">País</label>
                        <select class="form-control" id="pais" name="pais" onchange="setLocalidadesBusqueda()">
                            @if (isset($paises))
                                @foreach($paises as $pais)
                                    <option value="{{ $pais->id}}"> {{ $pais->nombre }} </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group ciudad-busqueda">
                        
                    </div>
                    <div class="form-group">
                        <label>Busco en</label>
                        <select class="form-control" id="busco" name="busco">
                            <option value="RENTA" selected>Renta</option>
                            <option value="VENTA" >Venta</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Huéspedes</label>
                        <input type="number" class="form-control" min="1" max="30" name="huespedes" id="huespedes" value="1">
                    </div>  
                    <div class="form-group">
                        <label for="">Donde se encuentra ubicado</label>
                        <select class="form-control" name="ubicacion" id="ubicacion">
                            @if(isset($ubicaciones))
                                <option value="" selected>Todas</option>
                                @foreach($ubicaciones as $ubicacion)
                                    <option value="{{ $ubicacion->nombre}}"> {{ $ubicacion->nombre }} </option>
                                @endforeach
                            @endif
                        </select>
                    </div>  
                    <div class="form-group">
                        <label for="">Tipo de inmueble</label>
                        <select class="form-control" name="inmueble" id="inmueble">
                            @if(isset($unidades))
                                <option value="" selected>Todos</option>
                                @foreach($unidades as $unidad)
                                    <option value="{{ $unidad->nombre}}"> {{ $unidad->nombre }} </option>
                                @endforeach
                            @endif
                        </select>
                    </div>  
                    <div class="form-group">
                        <button type="button" class="width-35 pull-right btn btn-primary" onclick="searchMembresias()">
                            <i class="ace-icon fa fa-search"></i>
                            Buscar
                        </button>
                    </div>
                        
                </form>

            </div>
            <div class="col-md-7">
                <div id="mapSearch" style="width 500px; height:400px"> </div>
            </div>
        </div>
        <section id="resultados-busqueda">
            <div class="row membresias-result mt-3">
                <div class="col-md-12">
                    <h3 class="Latest__title pb-1 text-center tiempo-title">
                        Resultados  
                    </h3>
                    <div class="tiempo-line-bottom-container margin-bottom">
                        <span class="tiempo-line-bottom"></span>
                    </div>
                </div>
                <div class="resultados-content row" ></div>
            </div>
        </section>
    </div>
@endsection