@extends('layouts.app')

@section('template_title')
    {{ $sucursal->name ?? __('Show') . " " . __('Sucursal') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="float-left">
                                <a href="{{ route('sucursal.index') }}" class="btn btn-outline-primary btn-sm ml-2" title="Volver"><i class="bi bi-arrow-left-circle"></i></a>
        
                            </div>
                            <strong id="card_title">
                                {{ __('Sucursal') }}
                            </strong>

                             <div class="float-right">
                                
       
        <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-sm ml-2" title="Panel Principal"><i class="bi bi-house"></i></a>
        
                   </div>
                        </div>
                    </div>
                    

                    <div class="card-body">
                        
                       
                        <div class="form-group">
                            <strong>Clave:</strong>
                            {{ $sucursal->Clave_sucursal ? $sucursal->Clave_sucursal: 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Sucursal:</strong>
                            {{ $sucursal->Nom_sucursal ? $sucursal->Nom_sucursal: 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Ext:</strong>
                            {{$sucursal->ext ? $sucursal->ext: 'N/A'}}
                        </div>
                        
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{$sucursal->tel ? $sucursal->tel: 'N/A'}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
