@extends('layouts.app')




@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-center">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="float-left">
                            
                                <a class="btn btn-outline-primary btn-sm ml-2" href="javascript:history.back()" title="Volver">
                                    <i class="bi bi-arrow-left-circle"></i>
                                </a>
                            </div>
                            <strong id="card_title">
                                {{ __('Validacion') }}
                            </strong>

                             
                             
                        </div>
                    </div>
    <form method="GET" action="{{ route('filter.index') }}">
        <select class="form-select" name="filter" aria-label="Default select example" onchange="this.form.submit()">
            <option selected value="">Filtrar:</option>
            <option value="empleados" {{ request()->get('filter') == 'empleados' ? 'selected' : '' }}>Empleados</option>
            <option value="stock" {{ request()->get('filter') == 'stock' ? 'selected' : '' }}>Stock</option>
            <option value="asigsuc" {{ request()->get('filter') == 'asigsuc' ? 'selected' : '' }}>AsigSuc</option>
            <option value="asigaper" {{ request()->get('filter') == 'asigaper' ? 'selected' : '' }}>AsigAper</option>
        </select>
    </form>

    <!-- Contenido de la vista -->
    @if($items && $items->isNotEmpty())
    <table class="table table-bordered table-striped table-responsive table-hover text-uppercase">
        <thead>
            <tr>
                @if(request()->get('filter') == 'empleados')
                    <th>Clave Empleados</th>
                    <th>Nombre</th>
                    <th>Puesto</th>
                    <th>Validar</th>
                @elseif(request()->get('filter') == 'stock')
                     <th>N.Serie</th>
                     <th>Tipo</th>
                     <th>Modelo</th>
                     <th>Validar</th>
                @elseif(request()->get('filter') == 'asigaper')
                    <th>N.Activo</th>
                    <th>N.Empleado</th>
                    <th>Tipo</th>
                    <th>Validar</th>
                @elseif(request()->get('filter') == 'asigsuc')
                <th>N.Folio</th>
                    <th>Sucursal</th>
                    <th>Validar</th>
                    
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            @if(request()->get('filter') == 'empleados')
            <tr class="table-row" data-url="{{ route('filter.show', ['filter' => 'empleados', 'id' => $item->id_empleado]) }}">
                <td>{{ $item->Clave_empleado }}</td>
                <td>{{ $item->nombre .' '.$item->apellidoP.' '.$item->apellidoM }}</td>
                <td>{{ $item->puesto->descripcion }}</td>
                <td class="text-center">
                    <div class="form-check form-switch d-flex justify-content-center align-items-center">
                        <input class="form-check-input validation-checkbox" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                    </div>
                </td>
            </tr>
          
            @elseif(request()->get('filter') == 'stock')
            <tr class="table-row" data-url="{{ route('filter.show', ['id' => $item->id_stock, 'filter' => 'stock']) }}">
                <td>{{ $item->Nserie }}</td>
                <td>{{ $item->tipo->nomTipo }}</td>
                <td>{{ $item->modelo->nomMod }}</td>
                <td class="text-center">
                    <div class="form-check form-switch d-flex justify-content-center align-items-center">
                        <input class="form-check-input validation-checkbox" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                    </div>
                </td>
            </tr>
            @elseif(request()->get('filter') == 'asigaper')
            <tr class="table-row" data-url="{{ route('filter.show', ['id' => $item->id_asigaper, 'filter' => 'asigaper']) }}">
                <td>{{ $item->stock->Nserie }}</td>
                <td>{{ $item->empleado->Clave_empleado }}</td>
                <td>{{ $item->stock->modelo->nomMod }}</td>
                <td class="text-center">
                    <div class="form-check form-switch d-flex justify-content-center align-items-center">
                        <input class="form-check-input validation-checkbox" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                    </div>
                </td>
            </tr>
            @elseif(request()->get('filter') == 'asigsuc')
            <tr class="table-row" data-url="{{ route('filter.show', ['id' => $item->id_asigsuc, 'filter' => 'asigsuc']) }}">
                
                <td>{{ $item->nFol }}</td>
                <td>{{ $item->sucursal->Nom_sucursal }}</td>
                
                <td class="text-center">
                    <div class="form-check form-switch d-flex justify-content-center align-items-center">
                        <input class="form-check-input validation-checkbox" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                    </div>
                </td>
            </tr>
            @endif
        @endforeach
        
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const rows = document.querySelectorAll('.table-row');
                rows.forEach(row => {
                    row.addEventListener('click', function (event) {
                        if (!event.target.classList.contains('validation-checkbox') && !event.target.classList.contains('form-check-label')) {
                            const url = this.getAttribute('data-url');
                            window.location.href = url;
                        }
                    });
                });
            });
        </script>
        
           
        </tbody>
    </table>
                </div></div>
    {{ $items->appends(request()->input())->links() }}
@else
    <p>No se encontraron Registros</p>
@endif
                </div></div>
@endsection
