@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Empleado') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('empleado.update', $empleado->id_empleado) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="Clave_empleado">N°.Empleado:</label>
                            <input type="text" name="Clave_empleado" value="{{ $empleado->Clave_empleado }}" class="form-control{{ $errors->has('Clave_empleado') ? ' is-invalid' : '' }}" placeholder="Clave Empleado" required>
                            @if ($errors->has('Clave_empleado'))
                                <div class="invalid-feedback">{{ $errors->first('Clave_empleado') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="nombre">Nombre(s):</label>
                            <input type="text" name="nombre" value="{{ $empleado->nombre }}" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="Nombre" required>
                            @if ($errors->has('nombre'))
                                <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="apellidoP">Apellido Paterno:</label>
                            <input type="text" name="apellidoP" value="{{ $empleado->apellidoP }}" class="form-control{{ $errors->has('apellidoP') ? ' is-invalid' : '' }}" placeholder="Apellido Paterno" required>
                            @if ($errors->has('apellidoP'))
                                <div class="invalid-feedback">{{ $errors->first('apellidoP') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="apellidoM">Apellido Materno:</label>
                            <input type="text" name="apellidoM" value="{{ $empleado->apellidoM }}" class="form-control{{ $errors->has('apellidoM') ? ' is-invalid' : '' }}" placeholder="Apellido Materno" required>
                            @if ($errors->has('apellidoM'))
                                <div class="invalid-feedback">{{ $errors->first('apellidoM') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="email">Correo:</label>
                            <input type="email" name="email" value="{{ $empleado->email }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Correo" >
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="celular">Celular:</label>
                            <input type="text" name="celular" value="{{ $empleado->celular }}" class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" placeholder="Celular" >
                            @if ($errors->has('celular'))
                                <div class="invalid-feedback">{{ $errors->first('celular') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="foto_emple">Foto Actual:</label>
                            <div>
                            @if ($empleado->foto_emple)
                                <img src="{{ asset('imagen/' . $empleado->foto_emple) }}" class="rounded-circle" width="50" height="50" alt="Foto del empleado" style="max-width: 200px;">
                            @else
                                <p>No hay foto disponible.</p>
                            @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="foto_emple">Subir Nueva Foto:</label>
                            <input type="file" name="foto_emple" class="form-control{{ $errors->has('foto_emple') ? ' is-invalid' : '' }}">
                            @if ($errors->has('foto_emple'))
                                <div class="invalid-feedback">{{ $errors->first('foto_emple') }}</div>
                            @endif
                        </div>
                        

                        <div class="form-group">
                            <label for="puesto_id">Puesto:</label>
                            <select class="form-control" name="puesto_id">
                                <option value="">Selecciona una Opción ...</option>
                                @foreach($puestos as $puesto)
                                    <option value="{{ $puesto->id_puesto}}" {{ $empleado->puesto_id == $puesto->id_puesto ? 'selected' : '' }}>{{ $puesto->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="departamento_id">Departamento:</label>
                            <select class="form-control" name="departamento_id">
                                <option value="">Selecciona una Opción ...</option>
                                @foreach($departamentos as $departamento)
                                    <option value="{{ $departamento->id_depart }}" {{ $empleado->departamento_id == $departamento->id_depart ? 'selected' : '' }}>{{ $departamento->Desc_d }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="sucursal_id">Sucursal:</label>
                            <select class="form-control" name="sucursal_id">
                                <option value="">Selecciona una Opción ...</option>
                                @foreach($sucursales as $sucursal)
                                    <option value="{{ $sucursal->id_sucursal }}" {{ $empleado->sucursal_id == $sucursal->id_sucursal ? 'selected' : '' }}>{{ $sucursal->Nom_sucursal }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="estatus_id">Estatus:</label>
                            <select class="form-control" name="estatus_id" id="estatus_id">
                                <option value="">Selecciona una Opción ...</option>
                                @foreach($estatus as $estatus_item)
                                    <option value="{{ $estatus_item->id_estat }}" {{ $empleado->estatus_id == $estatus_item->id_estat ? 'selected' : '' }}>{{ $estatus_item->estat }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group" id="fecha_baja_group" style="display: none;">
                            <label for="fecha_baja">Fecha de Baja:</label>
                            <input type="datetime-local" name="fecha_baja" id="fecha_baja" value="{{ old('fecha_baja', isset($empleado) && $empleado->fecha_baja ? \Carbon\Carbon::parse($empleado->fecha_baja)->format('Y-m-d\TH:i') : '') }}" class="form-control{{ $errors->has('fecha_baja') ? ' is-invalid' : '' }}">
                            {!! $errors->first('fecha_baja', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const estatusSelect = document.getElementById('estatus_id');
        const fechaBajaGroup = document.getElementById('fecha_baja_group');

        // Función para mostrar u ocultar el campo de fecha de baja
        function actualizarFechaBaja() {
            if (estatusSelect.value === '2') { // El valor '2' representa el estatus de 'Baja' (ajusta según tu lógica de estatus)
                fechaBajaGroup.style.display = 'block';
                document.getElementById('fecha_baja').setAttribute('required', 'required');
            } else {
                fechaBajaGroup.style.display = 'none';
                document.getElementById('fecha_baja').removeAttribute('required');
                document.getElementById('fecha_baja').value = ''; // Limpiar el valor si está oculto
            }
        }

        // Ejecutar la función inicialmente
        actualizarFechaBaja();

        // Escuchar cambios en el select de estatus
        estatusSelect.addEventListener('change', function () {
            actualizarFechaBaja();
        });
    });
</script>
@endsection


