<div class="box box-info padding-1">
    <div class="box-body">
        
        
        <div class="form-group">
            {{ Form::label('Clave') }}
            {{ Form::text('Clave_puesto', $puesto->Clave_puesto, ['class' => 'form-control' . ($errors->has('Clave_puesto') ? ' is-invalid' : ''), 'placeholder' => 'Clave Puesto']) }}
            {!! $errors->first('Clave_puesto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Puesto') }}
            {{ Form::text('Des_cort_p', $puesto->Des_cort_p, ['class' => 'form-control' . ($errors->has('Des_cort_p') ? ' is-invalid' : ''), 'placeholder' => 'Des Cort P']) }}
            {!! $errors->first('Des_cort_p', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripcion') }}
            {{ Form::text('descripcion', $puesto->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-outline-success">{{ __('Guardar') }}</button>
    </div>
</div>