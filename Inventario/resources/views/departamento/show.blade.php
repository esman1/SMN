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
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="float-left">
                                <a href="{{ route('departamento.index') }}" class="btn btn-outline-primary btn-sm ml-2" title="Volver"><i class="bi bi-arrow-left-circle"></i></a>
        
                            </div>
                            <strong id="card_title">
                                {{ __('Departamento') }}
                            </strong>

                             <div class="float-right">
                                 
       
        <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-sm ml-2" title="Panel Principa"><i class="bi bi-house"></i></a>
        
                   </div>
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
