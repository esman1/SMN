@extends('layouts.app')

@section('template_title')
    Empleado
@endsection

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
                                {{ __('Empleado') }}
                            </strong>
                            <div class="float-right">
                                @can('create-empleado')
                                    <a href="{{ route('empleado.create') }}" title="Nuevo" class="btn btn-outline-success btn-sm ml-2">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="float-right">
                            <input type="text" class="form-control mb-3 w-25" id="searchInput" placeholder="Buscar...">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle table-bordered">
                                <thead class="thead">
                                    <tr>
                                        <th>Foto</th>
                                        <th>N.Empleado</th>
                                        <th>Nombre(s)</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Puesto</th>
                                        <th>Departamento</th>
                                        <th>Sucursal</th>
                                        <th style="width: 250px;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="empleadoTableBody">
                                    @foreach ($empleados as $empleado)
                                    @if($empleado->estatusv === 'validado')
                                        <tr>
                                            <td>
                                                <img src="/imagen/{{$empleado->foto_emple}}" width="80" height="50">
                                            </td>
                                            <td>{{$empleado->Clave_empleado}}</td>
                                            <td>{{ $empleado->nombre }}</td>
                                            <td>{{ $empleado->apellidoP }}</td>
                                            <td>{{ $empleado->apellidoM }}</td>
                                            <td>{{ $empleado->puesto ? $empleado->puesto->descripcion : 'N/A' }}</td>
                                            <td>{{$empleado->departamento ? $empleado->departamento->Desc_d : 'N/A' }}</td>
                                            <td>{{ $empleado->sucursal ? $empleado->sucursal->Nom_sucursal : 'N/A' }}</td>
                                            <td>
                                                <form action="{{ route('empleado.destroy',$empleado->id_empleado) }}" method="POST">
                                                    @can('show-empleado')
                                                    <a class="btn btn-sm btn-outline-primary" href="{{ route('empleado.show',$empleado->id_empleado) }}"><i class="bi bi-eye"></i> {{ __('Ver') }}</a>
                                                    @endcan
                                                    @can('edit-empleado')
                                                    <a class="btn btn-sm btn-outline-warning" href="{{ route('empleado.edit',$empleado->id_empleado) }}"><i class="bi bi-pencil-square"></i> {{ __('Editar') }}</a>
                                                    @endcan
                                                    @can('delete-empleado')
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Seguro que quieres eliminarlo?');"><i class="bi bi-trash"></i> {{ __('Eliminar') }}</button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $empleados->links() !!}
            </div>
        </div>
    </div>
<<<<<<< Updated upstream
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let query = this.value;

            fetch(`/empleado/search?query=${query}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                let resultsContainer = document.getElementById('empleadoTableBody');
                resultsContainer.innerHTML = ''; // Limpia cualquier resultado anterior

                if (data.length > 0) {
                    data.forEach(function(empleado) {
                        resultsContainer.innerHTML += `
                            <tr>
                                <td><img src="/imagen/${empleado.foto_emple}" width="80" height="50"></td>
                                <td>${empleado.Clave_empleado}</td>
                                <td>${empleado.nombre}</td>
                                <td>${empleado.apellidoP}</td>
                                <td>${empleado.apellidoM}</td>
                                <td>${empleado.puesto ? empleado.puesto.descripcion : 'N/A'}</td>
                                <td>${empleado.departamento ? empleado.departamento.Desc_d : 'N/A'}</td>
                                <td>${empleado.sucursal ? empleado.sucursal.Nom_sucursal : 'N/A'}</td>
                                <td>
                                    <form action="/empleado/${empleado.id_empleado}" method="POST">
                                        @can('show-empleado')
                                        <a class="btn btn-sm btn-outline-primary" href="/empleado/${empleado.id_empleado}"><i class="bi bi-eye"></i> Ver</a>
                                        @endcan
                                        @can('edit-empleado')
                                        <a class="btn btn-sm btn-outline-warning" href="/empleado/${empleado.id_empleado}/edit"><i class="bi bi-pencil-square"></i> Editar</a>
                                        @endcan
                                        @can('delete-empleado')
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Seguro que quieres eliminarlo?');"><i class="bi bi-trash"></i> Eliminar</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                        `;
                    });
                } else {
                    resultsContainer.innerHTML = '<tr><td colspan="9">No se encontraron resultados</td></tr>';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
</script>
@endsection
=======
</div>
 @endsection
>>>>>>> Stashed changes
