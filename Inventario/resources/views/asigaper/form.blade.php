<div class="box box-info padding-1">
    <div class="box-body">
       
            @csrf <!-- Agrega el token CSRF para protección contra ataques de falsificación de solicitudes entre sitios (CSRF) -->
            
            <div class="form-group">
                <label for="tipo_id">Empleado:</label>
                <select class="form-control" name="tipo_id" id="tipo_id">
                    <option value="">Selecciona una Opcion ...</option>
                    @foreach($empleados as $empleado)
                        <option value="{{ $empleado->id_empleado }}"{{ $empleado->id_empleado == $asigaper->empleado_id ? 'selected' : '' }}>
                            {{ $empleado->Clave_empleado}} - {{ $empleado->nombre}}  {{ $empleado->apellidoP}}  {{ $empleado->apellidoM}}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="stock_id">Equipo:</label>
                <select class="form-control" name="stock_id" id="stock_id">
                    <option value="">Selecciona una Opción...</option>
                    @foreach($stocks as $stock)
                        @if($stock->Estatus === 'stock')
                            <option value="{{ $stock->id_stock }}"{{ $stock->id_stock == $asigaper->stock_id ? 'selected' : '' }}>
                                {{ $stock->Nserie }} - {{ $stock->Tipo->nomTipo }} - {{ $stock->modelo->nomMod }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
        
            <div class="box-footer mt20">
                <button type="submit" class="btn btn-outline-success">{{ __('Guardar') }}</button>
            </div>
       
    </div>
</div>

