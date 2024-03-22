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
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Stock</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('stock.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                    
											
                       
                        <div class="form-group">
                            <strong>N.Serie:</strong>
                            {{ $stock->Nserie }}
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
