@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Departamento
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="float-left">
                                <a href="{{ route('departamento.index') }}" class="btn btn-outline-primary btn-sm ml-2" title="Volver"><i class="bi bi-arrow-left-circle"></i></a>
        
                            </div>
                            <strong id="card_title">
                                {{ __('Departamento') }}
                            </strong>

                             <div class="float-right">
                                 
       
        <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-sm ml-2" title="Panel Principal"><i class="bi bi-house"></i></a>
        
               </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('departamento.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('departamento.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
