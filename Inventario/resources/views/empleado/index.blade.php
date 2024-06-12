@extends('layouts.app')

@section('template_title')
    Empleado
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <p></p>
            @can('create-empleado')
                <a href="{{ route('empleado.create') }}" title="Nuevo" class="btn btn-outline-success">
                    Crear Nuevo
                </a>
            @endcan
        </div>

        <div class="d-flex flex-wrap justify-content-center">
            @foreach ($empleados as $empleado)
            @if($empleado->estatusv === 'validado')
                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body text-center">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="flex-shrink-0">
                                <img src="/imagen/{{$empleado->foto_emple}}" class="rounded-circle" alt="Foto" width="40" height="40">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="card-title mb-1">{{ $empleado->nombre }} {{ $empleado->apellidoP }}</h5>
                                <p class="card-text mb-0">{{ $empleado->puesto ? $empleado->puesto->descripcion : 'N/A' }}</p>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-light btn-sm" type="button" id="dropdownMenuButton{{ $empleado->id_empleado }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton{{ $empleado->id_empleado }}">
                                    @can('show-empleado')
                                    <li><a class="dropdown-item" href="{{ route('empleado.show',$empleado->id_empleado) }}">Ver</a></li>
                                    @endcan
                                    @can('edit-empleado')
                                    <li><a class="dropdown-item" href="{{ route('empleado.edit',$empleado->id_empleado) }}">Editar</a></li>
                                    @endcan
                                    @can('delete-empleado')
                                    <li>
                                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $empleado->id_empleado }}">Eliminar</button>
                                    </li>
                                    @endcan
                                </ul>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="d-flex justify-content-around">
                                <p class="card-text"><strong>Departamento: </strong></p>
                                <p class="card-text"><strong>Email: </strong></p>
                            </div>
                            <div class="d-flex justify-content-around">
                                <p class="card-text">{{ $empleado->departamento ? $empleado->departamento->Desc_d : 'N/A' }}</p>
                                <p class="card-text">{{ $empleado->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal de confirmación de eliminación -->
                <div class="modal fade" id="deleteModal{{ $empleado->id_empleado }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $empleado->id_empleado }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{ $empleado->id_empleado }}">Confirmar Eliminación</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ¿Estás seguro de que quieres eliminar a este empleado?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <form action="{{ route('empleado.destroy', $empleado->id_empleado) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-3">
            {!! $empleados->links() !!}
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .dropdown-menu {
        background-color: #fff; /* Fondo blanco para el menú */
        color: #000; /* Texto negro para mejor contraste */
    }

    .dropdown-item {
        color: #000; /* Texto negro para las acciones */
    }

    .dropdown-item:hover {
        background-color: #f8f9fa; /* Fondo gris claro al pasar el ratón */
        color: #000; /* Asegurarse de que el texto siga siendo negro */
    }

    .card {
        flex: 1 0 20%; /* Para que las tarjetas ocupen aproximadamente un tercio del ancho disponible */
        margin: 10px;
    }

    .d-flex {
        display: flex;
        flex-wrap: wrap;
    }

    .card-text strong {
        margin-right: 10px;
    }
</style>
@endsection
