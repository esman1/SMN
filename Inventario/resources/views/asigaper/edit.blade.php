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
                        <span class="card-title">{{ __('Update') }} Asigaper</span>
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
