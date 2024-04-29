
<div class="box box-info padding-1">
    <div class="box-body">
    
        <div class="form-group">
            {{ Form::label('N.Serie:') }}
            {{ Form::text('Nserie', $stock->Nserie, ['class' => 'form-control' . ($errors->has('Nserie') ? ' is-invalid' : ''), 'placeholder' => 'Nserie']) }}
            {!! $errors->first('Nserie', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Modelo:') }}
            <select class="form-control select2" name="modelo_id">
                <option value="">Selecciona una Opcion ...</option>
                @foreach($modelos as $modelo)
                    <option value="{{ $modelo->id_modelo }}"{{ $modelo->id_modelo == $stock->modelo_id ? 'selected' : '' }}>
                        {{ $modelo->nomMod}}</option>
                @endforeach
             </select>
        </div>

     
        <div class="form-group">
            {{ Form::label('Tipo:') }}
            <select class="form-control select2" name="tipo_id">
                <option value="">Selecciona una Opcion ...</option>
                @foreach($tipos as $tipo)
                <option value="{{ $tipo->id_tipo }}" {{ $tipo->id_tipo == $stock->tipo_id ? 'selected' : '' }}>
                    {{ $tipo->nomTipo }}
                </option>  @endforeach
             </select>
             </div>
        <div class="form-group">
            {{ Form::label('Marca:') }}
            <select class="form-control select2" name="tipo_id">
                <option value="">Selecciona una Opcion ...</option>
                @foreach($marcas as $marca)
                    <option value="{{ $marca->id_marca }}"{{ $marca->id_marca == $stock->marca_id ? 'selected' : '' }}>
                        {{$marca->nomMar }}</option>
                @endforeach
             </select>    
        </div>
        <div class="form-group">
            {{ Form::label('Sistema Operativo:') }}
            <select class="form-control select2" name="tipo_id">
                <option value="">Selecciona una Opcion ...</option>
                @foreach($sisops as $sisop)
                    <option value="{{ $sisop->id_sisop }}"{{$sisop->id_sisop == $stock->sisop_id ? 'selected' : '' }}>
                        {{ $sisop->nomSis }}</option>
                @endforeach
             </select>    
        </div>
        <div class="form-group">
            {{ Form::label('Procesador:') }}
            <select class="form-control select2" name="tipo_id">
                <option value="">Selecciona una Opcion ...</option>
                @foreach($proces as $proc)
                    <option value="{{ $proc->id_proc }}"{{$proc->id_proc == $stock->proces_id? 'selected' : '' }}>
                        {{ $proc->nomProc }}</option>
                @endforeach
             </select>
        </div>
        <div class="form-group">
            {{ Form::label('Memoria:') }}
            <select class="form-control select2" name="tipo_id">
                <option value="">Selecciona una Opcion ...</option>
                @foreach($mems as $mem)
                    <option value="{{ $mem->id_mem }}"{{$mem->id_mem == $stock->mem_id ? 'selected' : '' }}>
                        {{ $mem->tipoMem }}</option>
                @endforeach
             </select>
        </div>
        <div class="form-group">
            {{ Form::label('Disco Duro:') }}
            <select class="form-control select2" name="tipo_id">
                <option value="">Selecciona una Opcion ...</option>
                @foreach($discs as $disc)
                    <option value="{{ $disc->id_disc }}"{{$disc->id_disc == $stock->disc_d ? 'selected' : '' }}>
                        {{ $disc->nomDis }}</option>
                @endforeach
             </select>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-outline-primary">{{ __('Guardar') }}</button>
    </div>
</div>