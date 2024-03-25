@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Roles</div>
    <div class="card-body">
        <div class="table-responsive">
        @can('create-role')
            <a href="{{ route('roles.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i>  Nuevo</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead class="text-center">
                <tr>
                
                <th scope="col" style="width: 100px">Nombre</th>
                <th scope="col" style="width: 100px;">Accion</th>
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