@extends('layouts.app')

@section('template_title')
    {{ $asigsuc->name ?? __('Ver') . " " . __('Asigsuc') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-right">
                            
                            <a href="{{route('asigsuc.index')}}" class="btn btn-outline-primary btn-sm ml-2" title="Volver"><i class="bi bi-arrow-left-circle"></i></a>
                            </div>
                        <div class="float-left">
                            <strong class="card-title">{{ __('Asignacion-Sucursal') }}</strong>
                        </div>
                        <div class="float-right">
                            
                        <a href="{{route('home')}}" class="btn btn-outline-secondary btn-sm ml-2" title="Panel Principal"><i class="bi bi-house"></i></a>
                        </div>
                            </div>
                    </div>     
                    

                    <div class="card-body">
                        
                        <div class="form-group row mb-3">
                            <div class="col-md-6">
                                <strong>Folio:</strong>
                                {{ $asigsucs->nFol ? $asigsucs->nFol : 'N/A' }}
                            </div>
                            <div class="col-md-3 text-md-right">
                                <strong>Sucursal:</strong>
                                {{$asigsucs->sucursal ? $asigsucs->sucursal->Nom_sucursal : 'N/A'}}
                            </div>
                        </div>
                        <div class="table-responsive text-center">
                            <table class="table table-striped table-hover align-middle">
                        
                            <thead class="thead">
                                <tr>
                                    <th class="border">Area</th>
                                   <th class="border">Tipo</th>
                                    <th class="border">Marca</th>
                                    <th class="border">Modelo</th>
                                    <th class="border">No.Serie</th>
                                    <th class="border">No.Activo</th>
                                    
                                    


                                    
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>{{ $asigsucs->area->nomArea }}</td>
                                        <!-- Aquí puedes agregar las columnas adicionales de acuerdo a tus necesidades -->
                                        <td>{{$asigsucs->stock ? $asigsucs->stock->tipo->nomTipo : 'N/A'}}</td>
                                        <td>{{$asigsucs->stock ? $asigsucs->stock->marca->nomMar : 'N/A'}}</td>
                                        <td>{{$asigsucs->stock ? $asigsucs->stock->modelo->nomMod : 'N/A'}}</td>
                                        <td>{{$asigsucs->stock ? $asigsucs->stock->Nserie : 'N/A'}}</td>
                                        <td>{{$asigsucs->nAct ? $asigsucs->nAct : 'N/A'}}</td>
                                    </tr>
                            </tbody>
                            <tfoot>
                                <tr class="text-right">
                                    <td colspan="6">
                                        <div class="float-right">
                                            <a href="{{ route('pdf.generar', ['id' => $asigsucs->id_asigsuc]) }}" class="btn btn-light" target="_blank"><i class="bi bi-printer"></i> PDF</a>
                                        </div>
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
