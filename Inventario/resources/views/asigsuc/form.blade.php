<div class="box box-info padding-1">
  <div class="box-body">
<div class='form-group'>
    <form method="POST" action="{{ route('asigsuc.store') }}">
        @csrf

        <div class="form-group">
            <label for="sucursal_id">Sucursal:</label>
            <select class="form-control" id="sucursal_id" name="sucursal_id">
                @foreach($sucursals as $suc)
                    <option value="{{ $suc->id_sucursal }}"{{$suc->id_sucursal == $asigsucs->suc_id ? 'selected' : '' }}>
                        {{ $suc->Nom_sucursal }}</option>
                @endforeach
                
            </select>
        </div>

        <div id="areas-container">
            @if (isset($areas))
                @foreach ($areas as $area)
                    <div class="area-container" data-area-id="{{ $area->id }}">
                        <div class="form-group">
                            <label for="area_id_{{ $area->id }}">Área:</label>
                            <input type="hidden" name="area_ids[]" value="{{ $area->id }}">
                            <input type="text" class="form-control" id="area_id_{{ $area->id }}" value="{{ $area->nombre }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="equipo_id_{{ $area->id }}">Equipo:</label>
                            <select class="form-control" id="equipo_id_{{ $area->id }}" name="equipo_ids_{{ $area->id }}">
                                @foreach ($equipos as $equipo)
                                    <option value="{{ $equipo->id }}">{{ $equipo->placa }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Asignar</button>
    </form>

    <script>
        // JavaScript code to add more areas dynamically
    </script>
