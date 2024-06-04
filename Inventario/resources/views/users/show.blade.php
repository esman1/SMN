@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div class="float-left">
                            
                        <a class="btn btn-outline-primary btn-sm ml-2" href="javascript:history.back()" title="Volver">
                            <i class="bi bi-arrow-left-circle"></i>
                        </a>
                    </div>
                <strong class="card-title">
               {{__ ('Usuario')}}
                </strong>
                
                <div class="float-end">
                    <a href="{{ route('home') }}"title="Panel Principal" class="btn btn-outline-secondary btn-sm ml-2"><i class="bi bi-house"></i></a>
                </div>
            </div>
            </div>
            <div class="card-body">

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Nombre:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $user->name }}
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start"><strong>Correo Electronico:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $user->email }}
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="roles" class="col-md-4 col-form-label text-md-end text-start"><strong>Roles:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            @forelse ($user->getRoleNames() as $role)
                                <span class="badge bg-primary">{{ $role }}</span>
                            @empty
                            @endforelse
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>    
@endsection