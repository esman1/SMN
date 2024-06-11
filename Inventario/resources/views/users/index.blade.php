
@extends('layouts.app')

@section('template_title')
    Usuarios
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Usuarios</h2>
            @can('create-empleado')
                <a href="{{ route('users.create') }}" title="Nuevo" class="btn btn-outline-success">
                    Crear Nuevo
                </a>
            @endcan
        </div>

        <div class="d-flex flex-wrap justify-content-center">
            @foreach ($users as $user)
            
                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body text-center">
                        <div class="d-flex align-items-center justify-content-between">
                            
                            <div class="flex-grow-1 ms-3">
                                <h5 class="card-title mb-1">{{ $user->name ? $user->name : 'N/A' }} </h5>
                                <p class="card-text mb-0">{{ $user->email ? $user->email : 'N/A' }}</p>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-light btn-sm" type="button" id="dropdownMenuButton{{ $user->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end"  aria-labelledby="dropdownMenuButton{{ $user->id }}">
                                    @can('show-empleado')
                                    <li><a class="dropdown-item"   href="{{ route('users.show',$user->id) }}">Ver</a></li>
                                    @endcan
                                    @can('edit-empleado')
                                    <li><a class="dropdown-item" href="{{ route('users.edit',$user->id) }}">Editar</a></li>
                                    @endcan
                                    @can('delete-empleado')
                                    <li>
                                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id }}">Eliminar</button>
                                    </li>
                                    @endcan
                                </ul>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="d-flex justify-content-around">
                                <p class="card-text"><strong>Rol: </strong></p>
                                <p class="card-text"><strong>Estatus: </strong></p>
                            </div>
                            <div class="d-flex justify-content-around"> 
                                @forelse ($user->getRoleNames() as $role)
                                
                         
                                <p class="card-text">{{$role}}</p>
                                @empty
                                @endforelse
                                <p class="card-text"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal de confirmación de eliminación -->
                <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $user->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{ $user->id }}">Confirmar Eliminación</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ¿Estás seguro de que quieres eliminar a este empleado?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
         
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-3">
            {!! $users->links() !!}
        </div>
    </div>
</div>
@endsection
