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
                            <i class="bi bi-bag"></i> Empleados</a>
                    @endcanany
                    @canany(['create-stock', 'edit-stock', 'delete-stock','show-stock'])
                        <a class="btn btn-warning" href="{{ route('stock.index') }}">
                            <i class="bi bi-bag"></i> Stock</a>
                    @endcanany
                    @canany(['create-asigaper', 'edit-asigaper', 'delete-asigaper','show-asigaper'])
                        <a class="btn btn-warning" href="{{ route('asigaper.index') }}">
                            <i class="bi bi-bag"></i> Asignar-Personal</a>
                    @endcanany
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection