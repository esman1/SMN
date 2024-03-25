@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Sucursal
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} Sucursal</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sucursal.update', $sucursal->id_sucursal) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('sucursal.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
