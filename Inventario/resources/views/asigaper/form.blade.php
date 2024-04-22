<div class="box box-info padding-1">
    <div class="box-body">
        
        
        <div class="form-group">
            {{ Form::label('Empleado:') }}
            <select class="form-control select2" name="tipo_id">
                <option value="">Selecciona una Opcion ...</option>
                @foreach($empleados as $empleado)
                    <option value="{{ $empleado->id_empleado }}"{{$empleado->id_empleado == $asigaper->empleado_id ? 'selected' : '' }}>
                        {{ $empleado->Clave_empleado}} - {{ $empleado->nombre}}  {{ $empleado->apellidoP}}  {{ $empleado->apellidoM}}</option>
                @endforeach
             </select>
        </div>
        <div class="form-group">
            {{ Form::label('Equipo: ') }}
            <select class="form-control select2" name="tipo_id">
                <option value="">Selecciona una Opcion ...</option>
                @foreach($stocks as $stock)
                    <option value="{{ $stock->id_stock }}"{{$stock->id_stock == $asigaper->stock_id ? 'selected' : '' }}>
                        {{ $stock->Nserie }} - {{ $stock->Tipo->nomTipo}} - {{ $stock->modelo->nomMod}}</option>
                @endforeach
             </select>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-outline-success">{{ __('Guardar') }}</button>
    </div>
</div>