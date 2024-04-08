<div class="box box-info padding-1">
    <div class="box-body">
        
      
        <div class="form-group">
            {{ Form::label('Clave:') }}
            {{ Form::text('Clave_dep', $departamento->Clave_dep, ['class' => 'form-control' . ($errors->has('Clave_dep') ? ' is-invalid' : ''), 'placeholder' => 'Clave Dep']) }}
            {!! $errors->first('Clave_dep', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Departamento:') }}
            {{ Form::text('Desc_corta_d', $departamento->Desc_corta_d, ['class' => 'form-control' . ($errors->has('Desc_corta_d') ? ' is-invalid' : ''), 'placeholder' => 'Desc Corta D']) }}
            {!! $errors->first('Desc_corta_d', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripcion:') }}
            {{ Form::text('Desc_d', $departamento->Desc_d, ['class' => 'form-control' . ($errors->has('Desc_d') ? ' is-invalid' : ''), 'placeholder' => 'Desc D']) }}
            {!! $errors->first('Desc_d', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-outline-primary">{{ __('Guardar') }}</button>
    </div>
</div>