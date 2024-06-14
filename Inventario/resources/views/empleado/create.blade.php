@extends('layouts.app')

@section('template_title')
    Crear Empleado
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear Empleado</div>

                    <div class="card-body">
                        <form id="empleado-form" method="POST" action="{{ route('empleado.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                {{ Form::label('N°.Empleado:') }}
                                {{ Form::text('Clave_empleado', old('Clave_empleado'), ['class' => 'form-control' . ($errors->has('Clave_empleado') ? ' is-invalid' : ''), 'placeholder' => 'Clave Empleado']) }}
                                {!! $errors->first('Clave_empleado', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Nombre(s):') }}
                                {{ Form::text('nombre', old('nombre'), ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Apellido Paterno:') }}
                                {{ Form::text('apellidoP', old('apellidoP'), ['class' => 'form-control' . ($errors->has('apellidoP') ? ' is-invalid' : ''), 'placeholder' => 'Apellido Paterno']) }}
                                {!! $errors->first('apellidoP', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Apellido Materno:') }}
                                {{ Form::text('apellidoM', old('apellidoM'), ['class' => 'form-control' . ($errors->has('apellidoM') ? ' is-invalid' : ''), 'placeholder' => 'Apellido Materno']) }}
                                {!! $errors->first('apellidoM', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Correo:') }}
                                {{ Form::text('email', old('email'), ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Correo']) }}
                                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Celular:') }}
                                {{ Form::text('celular', old('celular'), ['class' => 'form-control' . ($errors->has('celular') ? ' is-invalid' : ''), 'placeholder' => 'Celular']) }}
                                {!! $errors->first('celular', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Foto:') }}
                                {{ Form::file('foto_emple', ['class' => 'form-control' . ($errors->has('foto_emple') ? ' is-invalid' : '')]) }}
                                {!! $errors->first('foto_emple', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                {{ Form::label('Puesto:') }}
                                <select class="form-control select2" name="puesto_id"> 
                                    <option value="">Selecciona una Opción ...</option>
                                    @foreach($puestos as $puesto)
                                        <option value="{{ $puesto->id_puesto }}" {{ old('puesto_id') == $puesto->id_puesto ? 'selected' : '' }}>{{ $puesto->descripcion }}</option> 
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                {{ Form::label('Departamento:') }}
                                <select class="form-control select2" name="departamento_id">
                                    <option value="">Selecciona una Opción ...</option>
                                    @foreach($departamentos as $departamento)
                                        <option value="{{ $departamento->id_depart }}" {{ old('departamento_id') == $departamento->id_depart ? 'selected' : '' }}>{{ $departamento->Desc_d }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                {{ Form::label('Sucursal:') }}
                                <select class="form-control select2" name="sucursal_id">
                                    <option value="">Selecciona una Opción ...</option>
                                    @foreach($sucursales as $sucursal)
                                        <option value="{{ $sucursal->id_sucursal }}" {{ old('sucursal_id') == $sucursal->id_sucursal ? 'selected' : '' }}>{{ $sucursal->Nom_sucursal }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                {{ Form::label('Estatus:') }}
                                <select class="form-control select2" name="estatus_id">
                                    <option value="">Selecciona una Opción ...</option>
                                    @foreach($estatus as $estatus)
                                        <option value="{{ $estatus->id_estat }}" {{ old('estatus_id') == $estatus->id_estat ? 'selected' : '' }}>{{ $estatus->estat }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                {{ Form::label('Fecha de Contratación:') }}
                                <input type="datetime-local" name="fecha_contrat" value="{{ old('fecha_contrat', isset($empleado) && $empleado->fecha_contrat ? $empleado->fecha_contrat->format('Y-m-d\TH:i') : '') }}" class="form-control{{ $errors->has('fecha_contrat') ? ' is-invalid' : '' }}">
                                {!! $errors->first('fecha_contrat', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            

                            <div class="form-group">
                                {{ Form::label('Fecha de Alta:') }}
                                <input type="datetime-local" name="fecha_alta" value="{{ old('fecha_alta', isset($empleado) && $empleado->fecha_alta ? $empleado->fecha_alta->format('Y-m-d\TH:i') : '') }}" class="form-control{{ $errors->has('fecha_alta') ? ' is-invalid' : '' }}">
                                {!! $errors->first('fecha_alta', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            

                           

                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.getElementById('empleado-form').addEventListener('submit', function(event) {
        event.preventDefault();

        let confirmed = confirm('¿La información que estás por ingresar está confirmada?');
        let estatusvField = document.createElement('input');
        estatusvField.type = 'hidden';
        estatusvField.name = 'estatusv';

        if (confirmed) {
            estatusvField.value = 'validado';
        } else {
            estatusvField.value = 'no validado';
        }

        this.appendChild(estatusvField);
        this.submit();
    });
</script>
@endsection
