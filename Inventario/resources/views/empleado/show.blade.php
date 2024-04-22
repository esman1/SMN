@extends('layouts.app')

@section('template_title')
    {{ $empleado->name ?? __('Show') . " " . __('Empleado') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Visualizar') }} Empleado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-outline-primary" href="{{ route('empleado.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
											
                        
                        <div class="form-group">
                        
        <img src="/imagen/{{$empleado->foto_emple}}" width="100" height="80" >
     </div>
                        <div class="form-group">
                            <strong>Clave Empleado:</strong>
                            {{ $empleado->Clave_empleado }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre(s):</strong>
                            {{ $empleado->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido Paterno:</strong>
                            {{ $empleado->apellidoP }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido Materno:</strong>
                            {{ $empleado->apellidoM }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $empleado->email }}
                        </div>
                        <div class="form-group">
                            <strong>Celular:</strong>
                            {{ $empleado->celular }}
                        </div>
                     
                        <div class="form-group">
                            <strong>Puesto:</strong>
                            {{ $empleado->puesto ? $empleado->puesto->descripcion : 'N/A' }}

						</div>
                        <div class="form-group">
                            <strong>Departamento:</strong>
                            {{$empleado->departamento ? $empleado->departamento->Desc_d : 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Sucursal:</strong>
                            {{ $empleado->sucursal ? $empleado->sucursal->Nom_sucursal : 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Estatus:</strong>
                            {{ $empleado->estatus ? $empleado->estatus->estat : 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de Contratacion:</strong>
                            {{ $empleado->fecha_contrat }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de Alta:</strong>
                            {{ $empleado->fecha_alta }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de Baja:</strong>
                            {{ $empleado->fecha_baja }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
