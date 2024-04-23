@extends('layouts.app')
@section('template_title')
    Roles
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card text-center">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Roles') }}
                        </span>
                        @can('create-role')
                         <div class="float-right">
                            <a href="{{ route('roles.create') }}" class="btn btn-outline-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Nuevo</a>
                      @endcan
                        <a href="{{route ('home')}}" class="btn btn-outline-secondary btn-sm ml-2"><i class="bi bi-house" aria-hidden="true"></i> Volver</a> 
                          </div>
                    </div>
                </div>
    <div class="card-body">
        <div class="table-responsive">
       
        <table class="table table-striped table-hover">
            <thead class="thead">
                <tr>
                
                <th class="border">Nombre</th>
                <th class="border" style="width: 250px">Accion</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse ($roles as $role)
                <tr>
                    
                    <td >{{ $role->name }}</td>
                    <td>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('roles.show', $role->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Ver</a>

                            @if ($role->name!='Super Admin')
                                @can('edit-role')
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Editar</a>   
                                @endcan

                                @can('delete-role')
                                    @if ($role->name!=Auth::user()->hasRole($role->name))
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Seguro que desear eliminar?');"><i class="bi bi-trash"></i> Eliminar</button>
                                    @endif
                                @endcan
                            @endif

                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="3">
                        <span class="text-danger">
                            <strong>No Role Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>
        </div>
        {{ $roles->links() }}

    </div>
</div>
@endsection