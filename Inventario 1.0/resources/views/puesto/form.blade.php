<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_puesto') }}
            {{ Form::text('id_puesto', $puesto->id_puesto, ['class' => 'form-control' . ($errors->has('id_puesto') ? ' is-invalid' : ''), 'placeholder' => 'Id Puesto']) }}
            {!! $errors->first('id_puesto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Clave_puesto') }}
            {{ Form::text('Clave_puesto', $puesto->Clave_puesto, ['class' => 'form-control' . ($errors->has('Clave_puesto') ? ' is-invalid' : ''), 'placeholder' => 'Clave Puesto']) }}
            {!! $errors->first('Clave_puesto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Des_cort_p') }}
            {{ Form::text('Des_cort_p', $puesto->Des_cort_p, ['class' => 'form-control' . ($errors->has('Des_cort_p') ? ' is-invalid' : ''), 'placeholder' => 'Des Cort P']) }}
            {!! $errors->first('Des_cort_p', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $puesto->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-outline-success">{{ __('Guardar') }}</button>
    </div>
</div>