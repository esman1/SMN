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
                            <span class="card-title">{{ __('Show') }} Departamento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('departamentos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Depart:</strong>
                            {{ $departamento->id_depart }}
                        </div>
                        <div class="form-group">
                            <strong>Clave Dep:</strong>
                            {{ $departamento->Clave_dep }}
                        </div>
                        <div class="form-group">
                            <strong>Desc Corta D:</strong>
                            {{ $departamento->Desc_corta_d }}
                        </div>
                        <div class="form-group">
                            <strong>Desc D:</strong>
                            {{ $departamento->Desc_d }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
