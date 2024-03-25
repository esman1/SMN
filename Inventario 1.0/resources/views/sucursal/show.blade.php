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
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Sucursal</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('sucursal.index') }}"> {{ __('volver') }}</a>
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

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
