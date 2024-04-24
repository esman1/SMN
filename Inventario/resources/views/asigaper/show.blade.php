@extends('layouts.app')

@section('template_title')
    {{ $asigaper->name ?? __('Ver') . " " . __('Asigaper') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Asignacion</span>
                        </div>
                        <div class="float-right">
                            
                        <a href="{{route('home')}}" class="btn btn-outline-secondary "><i class="bi bi-house"></i> Inicio</a>
                        </div>
                            </div>
                    </div>     </div>
                    </div>

                    <div class="card-body">
                    <div class="form-group">
                        
                        <img src="/imagen/{{$asigaper->empleado ? $asigaper->empleado->foto_emple : 'N/A' }}" width="100" height="80" >
                     </div>
                        <div class="form-group">
                            <strong>N.Empleado: </strong>
                            {{ $asigaper->empleado ? $asigaper->empleado->Clave_empleado : 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre: </strong>
                            {{ $asigaper->empleado ? $asigaper->empleado->nombre : 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido: </strong>
                            {{ $asigaper->empleado ? $asigaper->empleado->apellidoP : 'N/A' }}
                        </div>
                       
                        <div class="form-group">
                            <strong>Departamento: </strong>
                            {{ $asigaper->empleado->departamento ? $asigaper->empleado->departamento->Desc_corta_d : 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Puesto: </strong>
                            <td>{{ $asigaper->empleado->puesto ? $asigaper->empleado->puesto->descripcion : 'N/A' }}</td>
                        </div>
                        <div class="form-group">
                            <strong>N.activo: </strong>
                            <td>{{ $asigaper-> Nactivo ? $asigaper->Nactivo : 'N/A'}}</td>
                        </div>
                        <div class="form-group">
                            <strong>Tipo: </strong>
                            <td>{{ $asigaper->stock ? $asigaper->stock->tipo->tipo : 'N/A' }}</td>
                        </div>
                        <div class="form-group">
                            <strong>Marca: </strong>
                            <td>{{ $asigaper->stock ? $asigaper->stock->marca->marca : 'N/A' }}</td>
                        </div>
                        <div class="form-group">
                            <strong>Modelo: </strong>
                            <td>{{ $asigaper->stock ? $asigaper->stock->modelo->modelo : 'N/A' }}</td>
                        </div>
                        <div class="form-group">
                            <strong>Sistema Operativo: </strong>
                            <td>{{ $asigaper->stock ? $asigaper->stock->sisop->nomSis : 'N/A' }}</td>
                        </div>
                        <div class="form-group">
                            <strong>Procesador: </strong>
                            <td>{{ $asigaper->stock ? $asigaper->stock->procesador->nomProc : 'N/A' }}</td>
                        </div>
                        <div class="form-group">
                            <strong>Memoria: </strong>
                            <td>{{ $asigaper->stock ? $asigaper->stock->memoria->tipoMem : 'N/A' }}</td>
                        </div>
                        <div class="form-group">
                            <strong>Disco Duro: </strong>
                            <td>{{ $asigaper->stock ? $asigaper->stock->discod->nomDis : 'N/A' }}</td>
                        </div>
                        <div class="form-group">
                            <strong>S/N: </strong>
                            <td>{{ $asigaper->stock ? $asigaper->stock->Nserie : 'N/A' }}</td>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
