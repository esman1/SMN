@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <!-- Card Container -->
        <div class="d-flex flex-wrap">
            @canany(['create-empleado', 'edit-empleado', 'delete-empleado', 'show-empleado'])
                <div class="col-md-3 p-2">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="bi bi-person-badge" style="font-size: 2rem; color: #ffc107;"></i>
                            <h5 class="card-title">Empleados</h5>
                            <p class="card-text">{{ $empleadosCount }}</p>
                        </div>
<<<<<<< Updated upstream
                    @endif

                    
<br>
<br>
                    
                    @canany(['create-role', 'edit-role', 'delete-role'])
                        <a class="btn btn-primary" href="{{ route('roles.index') }}">
                            <i class="bi bi-person-fill-gear"></i>Roles</a>
                    @endcanany
                    @canany(['create-user', 'edit-user', 'delete-user'])
                        <a class="btn btn-success" href="{{ route('users.index') }}">
                            <i class="bi bi-people"></i>Usuarios</a>
                    @endcanany
                    
                    @canany(['create-empleado', 'edit-empleado', 'delete-empleado','show-empleado'])
                        <a class="btn btn-warning" href="{{ route('empleado.index') }}">
                            <i class="bi bi-person-badge"></i> Empleados</a>
                    @endcanany
                    @canany(['create-stock', 'edit-stock', 'delete-stock','show-stock'])
                        <a class="btn btn-warning" href="{{ route('stock.index') }}">
                            <i class="bi bi-archive"></i> Stock</a>
                    @endcanany
                    @canany(['create-asigaper', 'edit-asigaper', 'delete-asigaper','show-asigaper'])
                        <a class="btn btn-warning" href="{{ route('asigaper.index') }}">
                            <i class="bi bi-person-add"></i> Asignar-Personal</a>
                    @endcanany
                   @canany(['create-asigaper', 'edit-asigaper', 'delete-asigaper','show-asigaper'])
                        <a class="btn btn-warning" href="{{ route('departamento.index') }}">
                            <i class="bi bi-building-fill-add"></i> Departamento</a>
                    @endcanany
                  @canany(['create-asigaper', 'edit-asigaper', 'delete-asigaper','show-asigaper'])
                     <a class="btn btn-warning" href="{{ route('sucursal.index') }}">
                            <i class="bi bi-shop"></i> Sucursal</a>
                    @endcanany
                    @canany(['create-puesto', 'edit-puesto', 'delete-puesto','show-puesto'])
                        <a class="btn btn-warning" href="{{ route('puesto.index') }}">
                            <i class="bi bi-person-workspace"></i> Puesto</a>
                    @endcanany
                    @canany(['create-asigsuc', 'edit-asigsuc', 'delete-asigsuc','show-asigsuc'])
                        <a class="btn btn-warning" href="{{ route('asigsuc.index') }}">
                            <i class="bi bi-building-add"></i> Asignacion-Tiendas </a>
                    @endcanany
                    @canany(['create-valid', 'edit-valid', 'delete-valid','show-valid'])
                    <a class="btn btn-warning" href="{{ route('filter.index') }}">
                        <i class="bi bi-check2-square"></i> Validacion de informacion</a>
                @endcanany
                @canany(['create-valid', 'edit-valid', 'delete-valid','show-valid'])
                <a class="btn btn-warning" href="{{ route('event.index') }}">
                    <i class="bi bi-calendar-week"></i> Calendario</a>
=======
                    </div>
                </div>
>>>>>>> Stashed changes
            @endcanany

            @canany(['create-stock', 'edit-stock', 'delete-stock', 'show-stock'])
                <div class="col-md-3 p-2">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="bi bi-archive" style="font-size: 2rem; color: #ffc107;"></i>
                            <h5 class="card-title">Stock</h5>
                            <p class="card-text">{{ $stockCount }}</p>
                        </div>
                    </div>
                </div>
            @endcanany

            @canany(['create-asigaper', 'edit-asigaper', 'delete-asigaper', 'show-asigaper'])
                <div class="col-md-3 p-2">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="bi bi-person-add" style="font-size: 2rem; color: #ffc107;"></i>
                            <h5 class="card-title">Asignar-Personal</h5>
                            <p class="card-text">{{ $asignarPersonalCount }}</p>
                        </div>
                    </div>
                </div>
            @endcanany

            @canany(['create-departamento', 'edit-departamento', 'delete-departamento', 'show-departamento'])
                <div class="col-md-3 p-2">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="bi bi-building-fill-add" style="font-size: 2rem; color: #ffc107;"></i>
                            <h5 class="card-title">Departamento</h5>
                            <p class="card-text">{{ $departamentoCount }}</p>
                        </div>
                    </div>
                </div>
            @endcanany

            @canany(['create-sucursal', 'edit-sucursal', 'delete-sucursal', 'show-sucursal'])
                <div class="col-md-3 p-2">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="bi bi-shop" style="font-size: 2rem; color: #ffc107;"></i>
                            <h5 class="card-title">Sucursal</h5>
                            <p class="card-text">{{ $sucursalCount }}</p>
                        </div>
                    </div>
                </div>
            @endcanany

            @canany(['create-puesto', 'edit-puesto', 'delete-puesto', 'show-puesto'])
                <div class="col-md-3 p-2">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="bi bi-person-workspace" style="font-size: 2rem; color: #ffc107;"></i>
                            <h5 class="card-title">Puesto</h5>
                            <p class="card-text">{{ $puestoCount }}</p>
                        </div>
                    </div>
                </div>
            @endcanany

            @canany(['create-asigsuc', 'edit-asigsuc', 'delete-asigsuc', 'show-asigsuc'])
                <div class="col-md-3 p-2">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="bi bi-building-add" style="font-size: 2rem; color: #ffc107;"></i>
                            <h5 class="card-title">Asignación-Tiendas</h5>
                            <p class="card-text">{{ $asignacionTiendaCount }}</p>
                        </div>
                    </div>
                </div>
            @endcanany

            @canany(['create-valid', 'edit-valid', 'delete-valid', 'show-valid'])
                <div class="col-md-3 p-2">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="bi bi-check2-square" style="font-size: 2rem; color: #ffc107;"></i>
                            <h5 class="card-title">Validación de Información</h5>
                            <p class="card-text">{{ $validacionPercentage }}%</p>
                        </div>
                    </div>
                </div>
            @endcanany

            <div class="col-md-3 p-2">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="bi bi-calendar-week" style="font-size: 2rem; color: #ffc107;"></i>
                        <h5 class="card-title">Calendario</h5>
                        <p class="card-text">{{ $calendarioCount }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
