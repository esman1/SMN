<div class="box box-info padding-1">
    <div class="box-body">
        
    
        <div class="form-group">
            {{ Form::label('N°.Empleado:') }}
            {{ Form::text('Clave_empleado', $empleado->Clave_empleado, ['class' => 'form-control' . ($errors->has('Clave_empleado') ? ' is-invalid' : ''), 'placeholder' => 'Clave Empleado']) }}
            {!! $errors->first('Clave_empleado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nombre(s):') }}
            {{ Form::text('nombre', $empleado->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Apellido Paterno:') }}
            {{ Form::text('apellidoP', $empleado->apellidoP, ['class' => 'form-control' . ($errors->has('apellidoP') ? ' is-invalid' : ''), 'placeholder' => 'Apellidop']) }}
            {!! $errors->first('apellidoP', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Apellido Materno:') }}
            {{ Form::text('apellidoM', $empleado->apellidoM, ['class' => 'form-control' . ($errors->has('apellidoM') ? ' is-invalid' : ''), 'placeholder' => 'Apellidom']) }}
            {!! $errors->first('apellidoM', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Correo:') }}
            {{ Form::text('email', $empleado->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Celular:') }}
            {{ Form::text('celular', $empleado->celular, ['class' => 'form-control' . ($errors->has('celular') ? ' is-invalid' : ''), 'placeholder' => 'Celular']) }}
            {!! $errors->first('celular', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Foto:') }}
            {{ Form::text('foto_emple', $empleado->foto_emple, ['class' => 'form-control' . ($errors->has('foto_emple') ? ' is-invalid' : ''), 'placeholder' => 'Foto Emple']) }}
            {!! $errors->first('foto_emple', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Puesto:') }}
            <select class="form-control select2" name="tipo_id">
                <option value="">Selecciona una Opcion ...</option>
                @foreach($puestos as $puesto)
                    <option value="{{ $empleado->id_puesto }}"{{$puesto->id_puesto == $empleado->puesto_id ? 'selected' : '' }}>
                        {{ $puesto->descripcion }}</option>
                @endforeach
             </select>
        </div>
        <div class="form-group">
            {{ Form::label('Departamento:') }}
            <select class="form-control select2" name="tipo_id">
                <option value="">Selecciona una Opcion ...</option>
                @foreach($departamentos as $dep)
                    <option value="{{ $empleado->id_depart }}"{{$dep->id_depart == $empleado->departamento_id ? 'selected' : '' }}>
                        {{ $dep->Desc_d }}</option>
                @endforeach
             </select>
        </div>
        <div class="form-group">
            {{ Form::label('Sucursal:') }}
            <select class="form-control select2" name="puesto_id">
                <option value="">Selecciona una Opcion ...</option>
                @foreach($sucursales as $suc)
                    <option value="{{ $empleado->id_sucursal }}"{{$suc->id_sucursal == $empleado->sucursal_id ? 'selected' : '' }}>
                        {{ $suc->Nom_sucursal }}</option>
                @endforeach
             </select>
        </div>
        <div class="form-group">
            {{ Form::label('Estatus:') }}
            <select class="form-control select2" name="tipo_id">
                <option value="">Selecciona una Opcion ...</option>
                @foreach($estatus as $est)
                    <option value="{{ $empleado->id_estat }}"{{$est->id_estat == $empleado->estatus_id ? 'selected' : '' }}>
                        {{ $est->estat }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{ Form::label('Fecha de Contratacion:') }}
            {{ Form::text('fecha_contrat', $empleado->fecha_contrat, ['class' => 'form-control' . ($errors->has('fecha_contrat') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Contrat']) }}
            {!! $errors->first('fecha_contrat', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha de Alta:') }}
            {{ Form::text('fecha_alta', $empleado->fecha_alta, ['class' => 'form-control' . ($errors->has('fecha_alta') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Alta']) }}
            {!! $errors->first('fecha_alta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha de Baja:') }}
            {{ Form::text('fecha_baja', $empleado->fecha_baja, ['class' => 'form-control' . ($errors->has('fecha_baja') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Baja']) }}
            {!! $errors->first('fecha_baja', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Registrar') }}</button>
    </div>
</div>