<!-- resources/views/filter/partials/empleados.blade.php -->

@extends('layouts.app')

@section('template_title')
    {{ $data->name ?? __('Show') . " " . __('Empleado') }}
@endsection

@section('content')
    <section class="content container-fluid ">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="float-left">
                            
                                <a class="btn btn-outline-primary btn-sm ml-2" href="javascript:history.back()" title="Volver">
                                    <i class="bi bi-arrow-left-circle"></i>
                                </a>
                            </div>
                            <strong class="card-title">{{ __('Visualizar') }} Empleado</strong>
                            <div class="float-right">
                                <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-sm ml-2"><i class="bi bi-house" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body text-uppercase">
                        <div class="form-group">
                            <img src="/imagen/{{ $data->foto_emple }}" width="100" height="80">
                        </div>
                        <div class="form-group">
                            <strong>Clave Empleado:</strong>
                            {{ $data->Clave_empleado }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre(s):</strong>
                            {{ $data->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido Paterno:</strong>
                            {{ $data->apellidoP }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido Materno:</strong>
                            {{ $data->apellidoM }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $data->email }}
                        </div>
                        <div class="form-group">
                            <strong>Celular:</strong>
                            {{ $data->celular }}
                        </div>
                        <div class="form-group">
                            <strong>Puesto:</strong>
                            {{ $data->puesto ? $data->puesto->descripcion : 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Departamento:</strong>
                            {{ $data->departamento ? $data->departamento->Desc_d : 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Sucursal:</strong>
                            {{ $data->sucursal ? $data->sucursal->Nom_sucursal : 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Estatus:</strong>
                            {{ $data->estatus ? $data->estatus->estat : 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de Contratacion:</strong>
                            {{ $data->fecha_contrat }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de Alta:</strong>
                            {{ $data->fecha_alta }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de Baja:</strong>
                            {{ $data->fecha_baja }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

