@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Asigsuc
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
                            
                                <a class="btn btn-outline-primary btn-sm ml-2" href="javascript:history.back()" title="Volver">
                                    <i class="bi bi-arrow-left-circle"></i>
                                </a>
                            </div>

                        <strong class="card-title">{{ __('Nueva') }} Asignacion-Sucursal</strong>
                        <div class="float-right">
                    <a href="{{route('home')}}" class="btn btn-outline-secondary btn-sm ml-2"title="Panel Principal"><i class="bi bi-house"></i></a>
                    </div>
                        </div>
                </div>
                    <div class="card-body ">
                        <form method="POST" action="{{ route('asigsuc.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="">
                                {{ Form::label('Folio:') }}
                                <input type="text" class="form-control" value="" readonly>
                                  </div>
        
                            <div class="">
                                {{Form::label('Sucursal:')}}
                                <select class="form-control" name="stock_id" id="stock_id">
                                    <option value="">Selecciona una Opción...</option>
                                    @foreach($sucursals as $sucursal)
                                       
                                            <option value="{{ $sucursal->id_sucursal }}"{{ $sucursal->id_sucursal == $asigsucs->suc_id ? 'selected' : '' }}>
                                                {{ $sucursal->Clave_sucursal }} - {{ $sucursal->Nom_sucursal}}
                                            </option>
                                      
                                    @endforeach
                                </select>
                           
                           
                            </div>
                            <div class="">
                                {{Form::label('Area:')}}
                                <select class="form-control" name="stock_id" id="stock_id">
                                    <option value="">Selecciona una Opción...</option>
                                    @foreach($areas as $area)
                                      
                                            <option value="{{ $area->id_area }}"{{ $area->id_area == $asigsucs->area_id ? 'selected' : '' }}>
                                                {{ $area->nomArea }} </option>
                                        
                                    @endforeach
                                </select>
                            </div>
                            <div class="">
                                {{Form::label('Equipo:')}}
                                <select class="form-control" name="stock_id" id="stock_id">
                                    <option value="">Selecciona una Opción...</option>
                                    @foreach($stocks as $stock)
                                       
                                            <option value="{{ $stock->id_stock }}"{{ $stock->id_stock == $asigsucs->stock_id ? 'selected' : '' }}>
                                                {{ $stock->Nserie }} - {{ $stock->Tipo->nomTipo }} - {{ $stock->modelo->nomMod }}
                                            </option>
                                     
                                            
                                    @endforeach
                                </select>
                            </div> 

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
