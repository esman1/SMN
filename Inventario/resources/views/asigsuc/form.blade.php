<div class="box box-info padding-1">
    <div class="box-body">
       
            @csrf <!-- Agrega el token CSRF para protección contra ataques de falsificación de solicitudes entre sitios (CSRF) -->
                <form>
                    <div class="">
                        {{ Form::label('Folio:') }}
                        <input type="text" class="form-control" value="" readonly>
                          </div>

                    <div class="">
                        {{Form::label('Sucursal:')}}
                        <select class="form-control" name="stock_id" id="stock_id">
                            <option value="">Selecciona una Opción...</option>
                            @foreach($sucursals as $sucursal)
                               
                                    <option value="{{ $sucursal->id_sucursal }}"{{ $sucursal->id_sucursal == $asigsucs->suc_id ? 'selected' : '' }}>
                                        {{ $sucursal->Clave_sucursal }} - {{ $sucursal->Nom_sucursal}}
                                    </option>
                              
                            @endforeach
                        </select>
                   
                   
                    </div>
                    <div class="">
                        {{Form::label('Area:')}}
                        <select class="form-control" name="stock_id" id="stock_id">
                            <option value="">Selecciona una Opción...</option>
                            @foreach($areas as $area)
                              
                                    <option value="{{ $area->id_area }}"{{ $area->id_area == $asigsucs->area_id ? 'selected' : '' }}>
                                        {{ $area->nomArea }} </option>
                                
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        {{Form::label('Equipo:')}}
                        <select class="form-control" name="stock_id" id="stock_id">
                            <option value="">Selecciona una Opción...</option>
                            @foreach($stocks as $stock)
                                @if($stock->Estatus === 'Stock')
                                    <option value="{{ $stock->id_stock }}"{{ $stock->id_stock == $asigsucs->stock_id ? 'selected' : '' }}>
                                        {{ $stock->Nserie }} - {{ $stock->Tipo->nomTipo }} - {{ $stock->modelo->nomMod }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </form>
   
   
   
   
   
        </div>
</div>