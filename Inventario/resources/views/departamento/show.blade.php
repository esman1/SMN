@extends('layouts.app')

@section('template_title')
    {{ $departamento->name ?? __('Show') . " " . __('Departamento') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Departamento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('departamento.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                       
                        <div class="form-group">
                            <strong>Clave:</strong>
                            {{ $departamento->Clave_dep }}
                        </div>
                        <div class="form-group">
                            <strong>Departamento:</strong>
                            {{ $departamento->Desc_corta_d }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $departamento->Desc_d }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
