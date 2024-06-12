@extends('layouts.app')

@section('template_title')
Usuarios
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
            {{ __('Usuarios') }}
        </strong>

         <div class="float-right">
            <a href="{{ route('users.create') }}" title="Agregar" class="btn btn-outline-success btn-sm ml-2"><i class="bi bi-plus-circle"></i></a>
      
          </div>
    </div>
</div>
    <div class="card-body">
        <div class="table-responsive">
           
        
       
    
        <table class="table table-striped table-hover align-middle table-bordered">
            <thead class="thead">
                <tr>
       
                <th  class="border">Nombre</th>
                <th  class="border">Correo</th>
                <th  class="border">Rol</th>
                <th  style="width: 250px;" scope="col">Accion</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                   
                    <td class="border">{{ $user->name }}</td>
                    <td  class="border">{{ $user->email }}</td>
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

                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-outline-primary btn-sm"><i class="bi bi-eye"></i> Ver</a>

                            @if (in_array('Super Admin', $user->getRoleNames()->toArray() ?? []) )
                                @if (Auth::user()->hasRole('Super Admin'))
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-warning btn-sm"><i class="bi bi-pencil-square"></i> Editar</a>
                                @endif
                            @else
                                @can('edit-user')
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-warning btn-sm"><i class="bi bi-pencil-square"></i> Editar</a>   
                                @endcan

                                @can('delete-user')
                                    @if (Auth::user()->id!=$user->id)
                                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('¿Quieres eliminar este usuario?');"><i class="bi bi-trash"></i> Eliminar</button>
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