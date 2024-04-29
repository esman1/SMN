@extends('layouts.app')

@section('template_title')
    {{ __('Nuevo') }} Empleado
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
                                <a href="{{route('empleado.index')}}"title="Volver" class="btn btn-outline-primary btn-sm ml-2"><i class="bi bi-arrow-left-circle"></i></a> 
                       
                            </div>
                        <strong class="card-title">{{ __('Nuevo') }} Empleado</strong>
                        <div class="float-right">
                            <a href="{{route('home')}}"title="Panel Principal" class="btn btn-outline-secondary btn-sm ml-2"><i class="bi bi-house"></i></a> 
                        </div>
                    </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('empleado.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('empleado.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection