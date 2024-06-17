@extends('layouts.app')

@section('template_title')
    {{ $empleado->name ?? __('Show') . " " . __('Empleado') }}
@endsection

@section('content')
                        <div class="float-left">
<section class="content container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <a class="btn btn-outline-primary btn-sm" href="javascript:history.back()" title="Volver">
                                <i class="bi bi-arrow-left-circle"></i>
                            </a>
                        </div>
                        <strong class="card-title">{{ __('Visualizar') }} Empleado</strong>
                        <div>
                            <a href="{{ route('home') }}" title="Panel Principal" class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-house"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="text-center mb-3">
                        <img src="/imagen/{{ $empleado->foto_emple }}" class="rounded-circle" alt="Foto de {{ $empleado->nombre }}" width="100" height="100">
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th scope="row">Clave Empleado:</th>
                                    <td>{{ $empleado->Clave_empleado }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nombre(s):</th>
                                    <td>{{ $empleado->nombre }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Apellido Paterno:</th>
                                    <td>{{ $empleado->apellidoP }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Apellido Materno:</th>
                                    <td>{{ $empleado->apellidoM }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Email:</th>
                                    <td>{{ $empleado->email ? $empleado->email : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Celular:</th>
                                    <td>{{ $empleado->celular ? $empleado->celular : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Puesto:</th>
                                    <td>{{ $empleado->puesto ? $empleado->puesto->descripcion : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Departamento:</th>
                                    <td>{{ $empleado->departamento ? $empleado->departamento->Desc_d : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Sucursal:</th>
                                    <td>{{ $empleado->sucursal ? $empleado->sucursal->Nom_sucursal : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Estatus:</th>
                                    <td>{{ $empleado->estatus ? $empleado->estatus->estat : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Fecha de Contratación:</th>
                                    <td>{{ $empleado->fecha_contrat }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Fecha de Alta:</th>
                                    <td>{{ $empleado->fecha_alta }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Fecha de Baja:</th>
                                    <td>{{ $empleado->fecha_baja ? $empleado->fecha_baja : 'N/A' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
