@extends('layouts.app')

@section('template_title')
    {{ $stock->name ?? __('Show') . " " . __('Stock') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="float-right">
                                <a class="btn btn-outline-primary btn-sm ml-2" href="javascript:history.back()" title="Volver">
                                    <i class="bi bi-arrow-left-circle"></i>
                                </a>
                            </div>
                            
                            <strong class="card-title">{{ __('Ver') }} Stock</strong>
                        <div class="float-left">
                            <a class="btn btn-outline-secondary  btn-sm ml-2" href="{{ route('home') }}" title="Panel Principal"><i class="bi bi-house"></i></a>
                        </div>
                       
                    </div>
                    </div>

                    <div class="card-body text-uppercase">
                    
											
                       
                        <div class="form-group">
                            <strong>N.Serie:</strong>
                            {{ $data->Nserie ? $data->Nserie : 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Modelo:</strong>
                            {{ $data->modelo ? $data->modelo->nomMod : 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            {{ $data->tipo ? $data->tipo->nomTipo : 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Marca:</strong>
                            {{ $data->marca ? $data->marca->nomMar : 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Sistema Operativo:</strong>
                            {{ $data->sisop ? $data->sisop->nomSis : 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Procesador:</strong>
                            {{ $data->procesador ? $data->procesador->nomProc : 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Memoria:</strong>
                            {{ $data->memoria ? $data->memoria->tipoMem : 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Disco Duro:</strong>
                            {{ $data->discod ? $data->discod->nomDis : 'N/A' }}
                        </div>

                    </div>
                    @can('edit-stock')
                    <a class="btn btn-sm btn-outline-warning" href="{{ route('stock.edit',$data->id_stock) }}"><i class="bi bi-pencil-square"></i> {{ __('Editar') }}</a>
                   @endcan
                </div>
            </div>
        </div>
    </section>
@endsection
