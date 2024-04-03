<div class="box box-info padding-1">
    <div class="box-body">
    
        <div class="form-group">
            {{ Form::label('Nserie') }}
            {{ Form::text('Nserie', $stock->Nserie, ['class' => 'form-control' . ($errors->has('Nserie') ? ' is-invalid' : ''), 'placeholder' => 'Nserie']) }}
            {!! $errors->first('Nserie', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('modelo_id') }}
            {{ Form::text('modelo_id', $stock->modelo_id, ['class' => 'form-control' . ($errors->has('modelo_id') ? ' is-invalid' : ''), 'placeholder' => 'Modelo Id']) }}
            {!! $errors->first('modelo_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo_id') }}
            {{ Form::text('tipo_id', $stock->tipo_id, ['class' => 'form-control' . ($errors->has('tipo_id') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Id']) }}
            {!! $errors->first('tipo_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('marca_id') }}
            {{ Form::text('marca_id', $stock->marca_id, ['class' => 'form-control' . ($errors->has('marca_id') ? ' is-invalid' : ''), 'placeholder' => 'Marca Id']) }}
            {!! $errors->first('marca_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sisop_id') }}
            {{ Form::text('sisop_id', $stock->sisop_id, ['class' => 'form-control' . ($errors->has('sisop_id') ? ' is-invalid' : ''), 'placeholder' => 'Sisop Id']) }}
            {!! $errors->first('sisop_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('proces_id') }}
            {{ Form::text('proces_id', $stock->proces_id, ['class' => 'form-control' . ($errors->has('proces_id') ? ' is-invalid' : ''), 'placeholder' => 'Proces Id']) }}
            {!! $errors->first('proces_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('mem_id') }}
            {{ Form::text('mem_id', $stock->mem_id, ['class' => 'form-control' . ($errors->has('mem_id') ? ' is-invalid' : ''), 'placeholder' => 'Mem Id']) }}
            {!! $errors->first('mem_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('disc_d') }}
            {{ Form::text('disc_d', $stock->disc_d, ['class' => 'form-control' . ($errors->has('disc_d') ? ' is-invalid' : ''), 'placeholder' => 'Disc D']) }}
            {!! $errors->first('disc_d', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-outline-primary">{{ __('Guardar') }}</button>
    </div>
</div>