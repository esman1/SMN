@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Asigaper
@endsection

@section('content')
    <section class="content container-fluid">
        <div class=" row justify-content-center">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span class="card-title">{{ __('Editar') }} Asignacion-Personal</span>
                    <div class="float-right">
                <a href="{{route('home')}}" class="btn btn-outline-secondary "><i class="bi bi-house"></i> Inicio</a>
                </div>
                    </div>
            </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('asigaper.update', $asigaper->id_asigaper) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('asigaper.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
