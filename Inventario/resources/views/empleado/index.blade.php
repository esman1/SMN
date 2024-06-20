@extends('layouts.app')

@section('template_title')
    Empleado
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Filtrar por
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#" data-filter="nombre">Nombre</a>
                    <a class="dropdown-item" href="#" data-filter="apellidoP">Apellido Paterno</a>
                    <a class="dropdown-item" href="#" data-filter="puesto">Puesto</a>
                    <a class="dropdown-item" href="#" data-filter="departamento">Departamento</a>
                    <div role="separator" class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-filter="estatus">Estado</a>
                  </div>
                </div>
                <input type="search" class="form-control" id="filtroEmpleado" aria-label="Text input with dropdown button" placeholder="Ingresa el valor a filtrar">
            </div>
              
            @can('create-empleado')
                <a href="{{ route('empleado.create') }}" title="Nuevo" class="btn btn-outline-success">
                    Crear Nuevo
                </a>
            @endcan
        </div>

        <div class="d-flex flex-wrap justify-content-center" id="resultadoEmpleados">
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

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const filtroEmpleado = document.getElementById('filtroEmpleado');

        // Escucha clics en el menú desplegable para filtrar empleados
        document.querySelectorAll('.dropdown-menu a.dropdown-item').forEach(item => {
            item.addEventListener('click', function (event) {
                event.preventDefault();
                const filtro = this.getAttribute('data-filter');
                filtrarEmpleados(filtro);
            });
        });

        // Escucha cambios en el campo de búsqueda para filtrar empleados en tiempo real
        filtroEmpleado.addEventListener('input', function () {
            const valor = this.value.trim().toLowerCase();
            filtrarEmpleadosPorTexto(valor);
        });

        // Función para filtrar empleados según el filtro seleccionado
        function filtrarEmpleados(filtro) {
            const empleados = document.querySelectorAll('.card');
            empleados.forEach(empleado => {
                const textoFiltro = empleado.querySelector(`.${filtro}`)?.textContent.toLowerCase() || '';
                empleado.style.display = textoFiltro.includes(filtro) ? 'block' : 'none';
            });
        }

        // Función para filtrar empleados por el texto ingresado en el campo de búsqueda
        function filtrarEmpleadosPorTexto(valor) {
            const empleados = document.querySelectorAll('.card');
            empleados.forEach(empleado => {
                let encontrado = false;
                empleado.querySelectorAll('.card-body *').forEach(elemento => {
                    if (elemento.textContent.toLowerCase().includes(valor)) {
                        encontrado = true;
                    }
                });
                empleado.style.display = encontrado ? 'block' : 'none';
            });
        }
            });

            document.addEventListener('DOMContentLoaded', function () {
    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
        modal.addEventListener('hide.bs.modal', function (event) {
            console.log('Modal is closing:', event.target.id);
        });
    });
});

</script>
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