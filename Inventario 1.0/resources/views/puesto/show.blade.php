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
                        <div class="float-left">
                            <span class="card-title">{{ __('Visualizar') }} Puesto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('puesto.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Puesto:</strong>
                            {{ $puesto->id_puesto }}
                        </div>
                        <div class="form-group">
                            <strong>Clave Puesto:</strong>
                            {{ $puesto->Clave_puesto }}
                        </div>
                        <div class="form-group">
                            <strong>Des Cort P:</strong>
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
