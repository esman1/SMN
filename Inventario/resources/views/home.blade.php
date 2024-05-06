@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
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
                    @canany(['create-puesto', 'edit-puesto', 'delete-puesto','show-puesto'])
                        <a class="btn btn-warning" href="{{ route('asigsuc.index') }}">
                            <i class="bi bi-person-workspace"></i> Asignacion-Tiendas </a>
                    @endcanany
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection