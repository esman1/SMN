<div class="box box-info padding-1">
    <div class="box-body">
        
    
        <div class="form-group">
            {{ Form::label('Clave_empleado') }}
            {{ Form::text('Clave_empleado', $empleado->Clave_empleado, ['class' => 'form-control' . ($errors->has('Clave_empleado') ? ' is-invalid' : ''), 'placeholder' => 'Clave Empleado']) }}
            {!! $errors->first('Clave_empleado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $empleado->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('apellidoP') }}
            {{ Form::text('apellidoP', $empleado->apellidoP, ['class' => 'form-control' . ($errors->has('apellidoP') ? ' is-invalid' : ''), 'placeholder' => 'Apellidop']) }}
            {!! $errors->first('apellidoP', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('apellidoM') }}
            {{ Form::text('apellidoM', $empleado->apellidoM, ['class' => 'form-control' . ($errors->has('apellidoM') ? ' is-invalid' : ''), 'placeholder' => 'Apellidom']) }}
            {!! $errors->first('apellidoM', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $empleado->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('celular') }}
            {{ Form::text('celular', $empleado->celular, ['class' => 'form-control' . ($errors->has('celular') ? ' is-invalid' : ''), 'placeholder' => 'Celular']) }}
            {!! $errors->first('celular', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('foto_emple') }}
            {{ Form::text('foto_emple', $empleado->foto_emple, ['class' => 'form-control' . ($errors->has('foto_emple') ? ' is-invalid' : ''), 'placeholder' => 'Foto Emple']) }}
            {!! $errors->first('foto_emple', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Puesto') }}
            {{ Form::text('puesto_id', $empleado->puesto_id, ['class' => 'form-control' . ($errors->has('puesto_id') ? ' is-invalid' : ''), 'placeholder' => 'Puesto Id']) }}
            {!! $errors->first('puesto_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Departamento') }}
            {{ Form::select('departamento_id',$departamentos->pluck('Desc_corta_d','id_depart'), ['class' => 'form-control' . ($errors->has('departamento_id') ? ' is-invalid' : ''), 'placeholder' => 'Departamento Id']) }}
            {!! $errors->first('departamento_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Sucursal') }}
            {{ Form::text('sucursal_id', $empleado->sucursal_id, ['class' => 'form-control' . ($errors->has('sucursal_id') ? ' is-invalid' : ''), 'placeholder' => 'Sucursal Id']) }}
            {!! $errors->first('sucursal_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Estatus') }}
            {{ Form::text('estatus', $empleado->estatus, ['class' => 'form-control' . ($errors->has('estatus') ? ' is-invalid' : ''), 'placeholder' => 'Estatus']) }}
            {!! $errors->first('estatus', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_contrat') }}
            {{ Form::text('fecha_contrat', $empleado->fecha_contrat, ['class' => 'form-control' . ($errors->has('fecha_contrat') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Contrat']) }}
            {!! $errors->first('fecha_contrat', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_alta') }}
            {{ Form::text('fecha_alta', $empleado->fecha_alta, ['class' => 'form-control' . ($errors->has('fecha_alta') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Alta']) }}
            {!! $errors->first('fecha_alta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_baja') }}
            {{ Form::text('fecha_baja', $empleado->fecha_baja, ['class' => 'form-control' . ($errors->has('fecha_baja') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Baja']) }}
            {!! $errors->first('fecha_baja', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>