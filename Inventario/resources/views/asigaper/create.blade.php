@extends('layouts.app')

@section('template_title')
    {{ __('Crear') }} Asignación-Personal
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="float-right">
                                <a class="btn btn-outline-primary btn-sm ml-2" href="javascript:history.back()" title="Volver">
                                    <i class="bi bi-arrow-left-circle"></i>
                                </a>
                            </div>
                            <strong class="card-title">{{ __('Nueva') }} Asignación-Personal</strong>
                            <div class="float-right">
                                <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-sm ml-2" title="Panel Principal">
                                    <i class="bi bi-house"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('asigaper.store') }}" role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="empleado_id">Empleado:</label>
                                <select class="form-control" name="empleado_id" id="empleado_id">
                                    <option value="">Selecciona una Opcion ...</option>
                                    @foreach($empleados as $empleado)
                                        <option value="{{ $empleado->id_empleado }}">
                                            {{ $empleado->Clave_empleado }} - {{ $empleado->nombre }} {{ $empleado->apellidoP }} {{ $empleado->apellidoM }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="stock_id">Equipo:</label>
                                <select class="form-control" name="stock_id" id="stock_id">
                                    <option value="">Selecciona una Opción...</option>
                                    @foreach($stocks as $stock)
                                        @if($stock->Estatus === 'stock')
                                            <option value="{{ $stock->id_stock }}">
                                                {{ $stock->Nserie }} - {{ $stock->Tipo->nomTipo }} - {{ $stock->modelo->nomMod }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Nactivo"># Activo:</label>
                                <input type="text" class="form-control" id="Nactivo" name="Nactivo" placeholder="Número de Activo">
                                @error('Nactivo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-outline-success">{{ __('Guardar') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
