@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Stock
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                <div class='card-header'>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                      
                        <div class="float-left">
                            <a class="btn btn-outline-primary btn-sm ml-2" href="javascript:history.back()" title="Volver">
                                <i class="bi bi-arrow-left-circle"></i>
                            </a>
                        </div>
                        
                    <strong class="card-title">{{ __('Nuevo') }} Stock</strong>
                    <div class="float-right">
                        <a href="{{route ('home')}}" class="btn btn-outline-secondary btn-sm ml-2" title="Panel Principal"><i class="bi bi-house" aria-hidden="true"></i></a> 
                             
                    </div>
                </div>
                </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('stock.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                           

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
