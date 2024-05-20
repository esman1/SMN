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
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-right">
                            
                            <a href="{{route('asigaper.index')}}" class="btn btn-outline-primary btn-sm ml-2" title="Volver"><i class="bi bi-arrow-left-circle"></i></a>
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
                        <label>{{ $asigaper->empleado ? $asigaper->empleado->Clave_empleado : 'N/A' }}
                    </div>
                    <div class="float-right mb-3">
                        <strong>Nombre:</strong>

                        <label class="text-uppercase"> {{ $asigaper->empleado ? $asigaper->empleado->nombre . ' ' . $asigaper->empleado->apellidoP . ' ' . $asigaper->empleado->apellidoM : 'N/A' }}
                        </label>
                        </div>
                        <div class="container text-uppercase">
                            <table class="table table-striped table-hover">
                                <tbody class="boder border-secondary text-center">
                                    <tr>
                                        
                                    <th scope="row">Tipo:</th>
                                    <td>{{ $asigaper->stock ? $asigaper->stock->Tipo->nomTipo : 'N/A' }}</td>
                                </tr>
                                    <tr>
                                        <th scope="row">Activo:</th>
                                        <td>{{ $asigaper->Nactivo ? $asigaper->Nactivo : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Marca:</th>
                                        <td>{{ $asigaper->stock ? $asigaper->stock->marca->nomMar : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Modelo:</th>
                                        <td>{{ $asigaper->stock ? $asigaper->stock->modelo->nomMod : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Sistema Operativo:</th>
                                        <td>{{ $asigaper->stock? $asigaper->stock->sisop->nomSis: 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Procesador:</th>
                                        <td>{{ $asigaper->stock ? $asigaper->stock->procesador->nomProc : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Memoria:</th>
                                        <td>{{ $asigaper->stock ? $asigaper->stock->memoria->tipoMem: 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Disco Duro:</th>
                                        <td>{{ $asigaper->stock ? $asigaper->stock->discod->nomDis : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">S/N:</th>
                                        <td>{{ $asigaper->stock ? $asigaper->stock->Nserie : 'N/A' }}</td>
                                    </tr>
                                    
                                    <!-- Agrega más filas aquí según tus necesidades -->
                                </tbody>
                                <tfoot>
                                    <tr class="text-right">
                                        <td colspan="6">
                                            <div class="float-center">
                                                <a href="{{ route('pdfemple.generar', ['id' => $asigaper->id_asigaper]) }}" class="btn btn-light" target="_blank"><i class="bi bi-printer"></i> PDF</a>                                       </div>
                                        </td>
                                    </tr>
                                </tfoot>
                                
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </section>
@endsection
