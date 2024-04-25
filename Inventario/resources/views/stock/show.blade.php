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
                                <a class="btn btn-outline-primary  btn-sm ml-2" href="{{ route('stock.index') }}" title="Volver"><i class="bi bi-arrow-left-circle"></i></a>
                            </div>
                            <strong class="card-title">{{ __('Ver') }} Stock</strong>
                        <div class="float-left">
                            <a class="btn btn-outline-secondary  btn-sm ml-2" href="{{ route('home') }}" title="Panel Principal"><i class="bi bi-house"></i></a>
                        </div>
                       
                    </div>
                    </div>

                    <div class="card-body">
                    
											
                       
                        <div class="form-group">
                            <strong>N.Serie:</strong>
                            {{ $stock->Nserie ? $stock->Nserie : 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Modelo:</strong>
                            {{ $stock->modelo ? $stock->modelo->nomMod : 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            {{ $stock->tipo ? $stock->tipo->nomTipo : 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Marca:</strong>
                            {{ $stock->marca ? $stock->marca->nomMar : 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Sistema Operativo:</strong>
                            {{ $stock->sisop ? $stock->sisop->nomSis : 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Procesador:</strong>
                            {{ $stock->procesador ? $stock->procesador->nomProc : 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Memoria:</strong>
                            {{ $stock->memoria ? $stock->memoria->tipoMem : 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Disco Duro:</strong>
                            {{ $stock->discod ? $stock->discod->nomDis : 'N/A' }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
