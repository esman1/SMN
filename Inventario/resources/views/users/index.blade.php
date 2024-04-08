@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Usuarios</div>
    <div class="card-body">
        <div class="table-responsive">
           
        @can('create-user')
            <a href="{{ route('users.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Nuevo</a>
        @endcan
    
        <table class="table table-striped table-hover align-middle table-bordered">
            <thead class="text-center">
                <tr>
       
                <th  scope="col">Nombre</th>
                <th  scope="col">Correo</th>
                <th  scope="col">Rol</th>
                <th  style="width: 250px;" scope="col">Accion</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse ($users as $user)
                <tr>
                   
                    <td >{{ $user->name }}</td>
                    <td >{{ $user->email }}</td>
                    <td>
                        @forelse ($user->getRoleNames() as $role)
                            <span class="badge bg-primary">{{ $role }}</span>
                        @empty
                        @endforelse
                    </td>
                    <td>
                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Ver</a>

                            @if (in_array('Super Admin', $user->getRoleNames()->toArray() ?? []) )
                                @if (Auth::user()->hasRole('Super Admin'))
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Editar</a>
                                @endif
                            @else
                                @can('edit-user')
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Editar</a>   
                                @endcan

                                @can('delete-user')
                                    @if (Auth::user()->id!=$user->id)
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this user?');"><i class="bi bi-trash"></i> Eliminar</button>
                                    @endif
                                @endcan
                            @endif

                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="5">
                        <span class="text-danger">
                            <strong>No existe!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>
        </div>
        {{ $users->links() }}

    </div>
</div>
    
@endsection