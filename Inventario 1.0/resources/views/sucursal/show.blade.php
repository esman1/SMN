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
                            <span class="card-title">{{ __('Show') }} Sucursal</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('sucursals.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Sucursal:</strong>
                            {{ $sucursal->id_sucursal }}
                        </div>
                        <div class="form-group">
                            <strong>Clave Sucursal:</strong>
                            {{ $sucursal->Clave_sucursal }}
                        </div>
                        <div class="form-group">
                            <strong>Nom Sucursal:</strong>
                            {{ $sucursal->Nom_sucursal }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
