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
                            <strong id="card_title">{{ __('Validacion') }}</strong>
                            <div class="float-right">
                                <a href="{{route('home')}}" title="Panel Principal" class="btn btn-outline-secondary btn-sm ml-2 "><i class="bi bi-house" aria-hidden="true"></i></a>
                                
                            </div>
                        </div>
                    </div>
                    <form method="GET" action="{{ route('filter.index') }}">
                        <div class="float-right">
                            <select class="form-select w-25 mb-3" name="filter" aria-label="Default select example" onchange="this.form.submit()">
                                <option selected value="">Filtrar:</option>
                                <option value="empleados" {{ request()->get('filter') == 'empleados' ? 'selected' : '' }}>Empleados</option>
                                <option value="stock" {{ request()->get('filter') == 'stock' ? 'selected' : '' }}>Stock</option>
                                <option value="asigsuc" {{ request()->get('filter') == 'asigsuc' ? 'selected' : '' }}>AsigSuc</option>
                                <option value="asigaper" {{ request()->get('filter') == 'asigaper' ? 'selected' : '' }}>AsigAper</option>
                            </select>
                        </div>
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
                                @if(request()->get('filter') == 'empleados' && $item->estatusv === 'no validado')
                                    <tr class="table-row" data-url="{{ route('filter.show', ['filter' => 'empleados', 'id' => $item->id_empleado]) }}">
                                        <td>{{ $item->Clave_empleado }}</td>
                                        <td>{{ $item->nombre .' '.$item->apellidoP.' '.$item->apellidoM }}</td>
                                        <td>{{ $item->puesto->descripcion }}</td>
                                        <td class="text-center">
                                            <div class="form-check form-switch d-flex justify-content-center align-items-center">
                                                <input class="form-check-input validation-checkbox" type="checkbox" data-id="{{ $item->id_empleado }}">
                                                <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                            </div>
                                        </td>
                                    </tr>
                                @elseif(request()->get('filter') == 'stock' && $item->estatusv === 'no validado')
                                    <tr class="table-row" data-url="{{ route('filter.show', ['id' => $item->id_stock, 'filter' => 'stock']) }}">
                                        <td>{{ $item->Nserie }}</td>
                                        <td>{{ $item->tipo->nomTipo }}</td>
                                        <td>{{ $item->modelo->nomMod }}</td>
                                        <td class="text-center">
                                            <div class="form-check form-switch d-flex justify-content-center align-items-center">
                                                <input class="form-check-input validation-checkbox" type="checkbox" data-id="{{ $item->id_stock }}">
                                                <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                            </div>
                                        </td>
                                    </tr>
                                @elseif(request()->get('filter') == 'asigaper' && $item->estatusv === 'no validado')
                                    <tr class="table-row" data-url="{{ route('filter.show', ['id' => $item->id_asigaper, 'filter' => 'asigaper']) }}">
                                        <td>{{ $item->stock->Nserie }}</td>
                                        <td>{{ $item->empleado->Clave_empleado }}</td>
                                        <td>{{ $item->stock->modelo->nomMod }}</td>
                                        <td class="text-center">
                                            <div class="form-check form-switch d-flex justify-content-center align-items-center">
                                                <input class="form-check-input validation-checkbox" type="checkbox" data-id="{{ $item->id_asigaper }}">
                                                <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                            </div>
                                        </td>
                                    </tr>
                                @elseif(request()->get('filter') == 'asigsuc' && $item->estatusv === 'no validado')
                                    <tr class="table-row" data-url="{{ route('filter.show', ['id' => $item->id_asigsuc, 'filter' => 'asigsuc']) }}">
                                        <td>{{ $item->nFol }}</td>
                                        <td>{{ $item->sucursal->Nom_sucursal }}</td>
                                        <td class="text-center">
                                            <div class="form-check form-switch d-flex justify-content-center align-items-center">
                                                <input class="form-check-input validation-checkbox" type="checkbox" data-id="{{ $item->id_asigsuc }}">
                                                <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    {{ $items->appends(request()->input())->links() }}
                    @else
                        <p>No se encontraron Registros</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

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
        
            const checkboxes = document.querySelectorAll('.validation-checkbox');
        
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    const id = this.getAttribute('data-id');
                    const filter = '{{ request()->get('filter') }}';
                    const status = this.checked ? 'validado' : 'no validado';
                    updateStatusInDatabase(id, status, filter);
                });
            });
        
            function updateStatusInDatabase(id, status, filter) {
                fetch('/actualizar-estado', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ id: id, status: status, filter: filter })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error al actualizar el estado en la base de datos');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Estado actualizado exitosamente:', data);
                    location.reload(); // Recargar la página para actualizar la tabla
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        });
        </script>
@endsection
