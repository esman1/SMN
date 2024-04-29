@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Asigaper
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="float-left">
                                
                           
                    <a href="{{route('asigaper.index')}}" class="btn btn-outline-primary btn-sm ml-2"title="Volver"><i class="bi bi-arrow-left-circle"></i></a>
                            </div>

                        <strong class="card-title">{{ __('Nueva') }} Asignacion-Personal</strong>
                        <div class="float-right">
                    <a href="{{route('home')}}" class="btn btn-outline-secondary btn-sm ml-2"title="Panel Principal"><i class="bi bi-house"></i></a>
                    </div>
                        </div>
                </div>
                    <div class="card-body ">
                        <form method="POST" action="{{ route('asigaper.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('asigaper.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
