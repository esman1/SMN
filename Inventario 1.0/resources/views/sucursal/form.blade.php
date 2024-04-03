<div class="box box-info padding-1">
    <div class="box-body">
        
        
        <div class="form-group">
            {{ Form::label('Clave_sucursal') }}
            {{ Form::text('Clave_sucursal', $sucursal->Clave_sucursal, ['class' => 'form-control' . ($errors->has('Clave_sucursal') ? ' is-invalid' : ''), 'placeholder' => 'Clave Sucursal']) }}
            {!! $errors->first('Clave_sucursal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nom_sucursal') }}
            {{ Form::text('Nom_sucursal', $sucursal->Nom_sucursal, ['class' => 'form-control' . ($errors->has('Nom_sucursal') ? ' is-invalid' : ''), 'placeholder' => 'Nom Sucursal']) }}
            {!! $errors->first('Nom_sucursal', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-outline-primary">{{ __('Guardar') }}</button>
    </div>
</div>