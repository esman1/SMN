@extends('layouts.app')

@section('template_title')
    {{ __('Editar') }} Puesto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="float-left">
                                <a href="{{ route('puesto.index') }}" class="btn btn-outline-primary btn-sm my-2" title="Volver"><i class="bi bi-arrow-left-circle"></i></a>
        
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
                        <form method="POST" action="{{ route('puesto.update', $puesto->id_puesto) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('puesto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
