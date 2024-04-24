@extends('layouts.app')

@section('template_title')
    {{ __('Actualizar') }} Empleado
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
                            <a href="{{route('empleado.index')}}" class="btn btn-outline-primary btn-sm ml-2 "><i class="bi bi-arrow-left-circle"></i></a>
                            </div>
                        <span class="card-title">{{ __('Actualizar') }} Empleado</span>
                        
                    </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('empleado.update', $empleado->id_empleado) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('empleado.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
