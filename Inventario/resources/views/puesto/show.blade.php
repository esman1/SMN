@extends('layouts.app')

@section('template_title')
    {{ $puesto->name ?? __('Visualizar') . " " . __('Puesto') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="float-left">
                            
                                <a class="btn btn-outline-primary btn-sm ml-2" href="javascript:history.back()" title="Volver">
                                    <i class="bi bi-arrow-left-circle"></i>
                                </a>
                            </div>
                            <strong id="card_title">
                                {{ __('Puesto') }}
                            </strong>

                             <div class="float-right">
                                 
       
        <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-sm my-2" title="Panel Principa"><i class="bi bi-house"></i></a>
        
                   </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        
                        <div class="form-group">
                            <strong>Clave:</strong>
                            {{ $puesto->Clave_puesto }}
                        </div>
                        <div class="form-group">
                            <strong>Puesto:</strong>
                            {{ $puesto->Des_cort_p }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $puesto->descripcion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
