@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div class="float-left">
                        <a href="{{route ('roles.index')}}"title="Volver" class="btn btn-outline-primary  btn-sm ml-2"><i class="bi bi-arrow-left-circle" aria-hidden="true"></i></a> 
                    
                    </div>
                 <strong class="card-title">
                    {{__('Informacion del Rol')}}
                 </strong>
                <div class="float-end">
                    <a href="{{ route('home') }}" title="Panel Principal" class="btn btn-outline-secondary btn-sm ml-2"><i class="bi bi-house"></i></a>
                </div>
            </div>
            </div>
            <div class="card-body">

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Nombre:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $role->name }}
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="roles" class="col-md-4 col-form-label text-md-end text-start"><strong>Permisos:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            @if ($role->name=='Super Admin')
                                <span class="badge bg-primary">Todos</span>
                            @else
                                @forelse ($rolePermissions as $permission)
                                    <span class="badge bg-primary">{{ $permission->name }}</span>
                                @empty
                                @endforelse
                            @endif
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>    
@endsection