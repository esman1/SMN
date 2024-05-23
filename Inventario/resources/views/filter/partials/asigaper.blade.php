@extends('layouts.app')

@section('template_title')
    {{ $data->name ?? __('Ver') . " " . __('Asigaper') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="float-left">
                            
                                <a class="btn btn-outline-primary btn-sm ml-2" href="javascript:history.back()" title="Volver">
                                    <i class="bi bi-arrow-left-circle"></i>
                                </a>
                            </div>
                        <div class="float-left">
                            <strong class="card-title">{{ __('Ver') }} Asignacion</strong>
                        </div>
                        <div class="float-right">
                            
                        <a href="{{route('home')}}" class="btn btn-outline-secondary btn-sm ml-2" title="Panel Principal"><i class="bi bi-house"></i></a>
                        </div>
                            </div>
                    </div>     
                    

                    <div class="card-body">
                        <div class="float-left mb-1">
                        <Strong >No.Empleado:</strong>
                        <label>{{ $data->empleado ? $data->empleado->Clave_empleado : 'N/A' }}
                    </div>
                    <div class="float-right mb-3">
                        <strong>Nombre:</strong>

                        <label class="text-uppercase"> {{ $data->empleado ? $data->empleado->nombre . ' ' . $data->empleado->apellidoP . ' ' . $data->empleado->apellidoM : 'N/A' }}
                        </label>
                        </div>
                        <div class="container text-uppercase">
                            <table class="table table-striped table-hover">
                                <tbody class="boder border-secondary text-center">
                                    <tr>
                                        
                                    <th scope="row">Tipo:</th>
                                    <td>{{ $data->stock ? $data->stock->Tipo->nomTipo : 'N/A' }}</td>
                                </tr>
                                    <tr>
                                        <th scope="row">Activo:</th>
                                        <td>{{ $data->Nactivo ? $data->Nactivo : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Marca:</th>
                                        <td>{{ $data->stock ? $data->stock->marca->nomMar : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Modelo:</th>
                                        <td>{{ $data->stock ? $data->stock->modelo->nomMod : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Sistema Operativo:</th>
                                        <td>{{ $data->stock? $data->stock->sisop->nomSis: 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Procesador:</th>
                                        <td>{{ $data->stock ? $data->stock->procesador->nomProc : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Memoria:</th>
                                        <td>{{ $data->stock ? $data->stock->memoria->tipoMem: 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Disco Duro:</th>
                                        <td>{{ $data->stock ? $data->stock->discod->nomDis : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">S/N:</th>
                                        <td>{{ $data->stock ? $data->stock->Nserie : 'N/A' }}</td>
                                    </tr>
                                    
                                    <!-- Agrega más filas aquí según tus necesidades -->
                                </tbody>
                                
                                
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </section>
@endsection
