<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_asigaper') }}
            {{ Form::text('id_asigaper', $asigaper->id_asigaper, ['class' => 'form-control' . ($errors->has('id_asigaper') ? ' is-invalid' : ''), 'placeholder' => 'Id Asigaper']) }}
            {!! $errors->first('id_asigaper', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('empleado_id') }}
            {{ Form::text('empleado_id', $asigaper->empleado_id, ['class' => 'form-control' . ($errors->has('empleado_id') ? ' is-invalid' : ''), 'placeholder' => 'Empleado Id']) }}
            {!! $errors->first('empleado_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('stock_id') }}
            {{ Form::text('stock_id', $asigaper->stock_id, ['class' => 'form-control' . ($errors->has('stock_id') ? ' is-invalid' : ''), 'placeholder' => 'Stock Id']) }}
            {!! $errors->first('stock_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-outline-success">{{ __('Guardar') }}</button>
    </div>
</div>