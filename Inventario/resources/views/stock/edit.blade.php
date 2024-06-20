@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Stock
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="float-right">
                                <a class="btn btn-outline-primary btn-sm ml-2" href="javascript:history.back()" title="Volver">
                                    <i class="bi bi-arrow-left-circle"></i>
                                </a>
                            </div>
                            
                        <strong class="card-title">{{ __('Actualizar') }} Stock</strong>
                        <div class="float-right">
                            <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-sm ml-2" title="Panel Principal">
                                <i class="bi bi-house" aria-hidden="true"></i>
                            </a> 
                        </div>
                    </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('stock.update', $stock->id_stock) }}" role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            <div class="form-group">
                                {{ Form::label('N.Serie:') }}
                                {{ Form::text('Nserie', $stock->Nserie, ['class' => 'form-control' . ($errors->has('Nserie') ? ' is-invalid' : ''), 'placeholder' => 'Nserie']) }}
                                {!! $errors->first('Nserie', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Modelo:') }}
                                <select class="form-control" name="modelo_id">
                                    <option value="">Selecciona una Opcion ...</option>
                                    @foreach($modelos as $modelo)
                                        <option value="{{ $modelo->id_modelo }}" {{ $modelo->id_modelo == $stock->modelo_id ? 'selected' : '' }}>
                                            {{ $modelo->nomMod }}
                                        </option>
                                    @endforeach
                                </select>
                                {!! $errors->first('modelo_id', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Tipo:') }}
                                <select class="form-control" name="tipo_id">
                                    <option value="">Selecciona una Opcion ...</option>
                                    @foreach($tipos as $tipo)
                                        <option value="{{ $tipo->id_tipo }}" {{ $tipo->id_tipo == $stock->tipo_id ? 'selected' : '' }}>
                                            {{ $tipo->nomTipo }}
                                        </option>
                                    @endforeach
                                </select>
                                {!! $errors->first('tipo_id', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Marca:') }}
                                <select class="form-control" name="marca_id">
                                    <option value="">Selecciona una Opcion ...</option>
                                    @foreach($marcas as $marca)
                                        <option value="{{ $marca->id_marca }}" {{ $marca->id_marca == $stock->marca_id ? 'selected' : '' }}>
                                            {{ $marca->nomMar }}
                                        </option>
                                    @endforeach
                                </select>
                                {!! $errors->first('marca_id', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Sistema Operativo:') }}
                                <select class="form-control" name="sisop_id">
                                    <option value="">Selecciona una Opcion ...</option>
                                    @foreach($sisops as $sisop)
                                        <option value="{{ $sisop->id_sisop }}" {{ $sisop->id_sisop == $stock->sisop_id ? 'selected' : '' }}>
                                            {{ $sisop->nomSis }}
                                        </option>
                                    @endforeach
                                </select>
                                {!! $errors->first('sisop_id', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Procesador:') }}
                                <select class="form-control" name="proces_id">
                                    <option value="">Selecciona una Opcion ...</option>
                                    @foreach($proces as $proc)
                                        <option value="{{ $proc->id_proc }}" {{ $proc->id_proc == $stock->proces_id ? 'selected' : '' }}>
                                            {{ $proc->nomProc }}
                                        </option>
                                    @endforeach
                                </select>
                                {!! $errors->first('proces_id', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Memoria:') }}
                                <select class="form-control" name="mem_id">
                                    <option value="">Selecciona una Opcion ...</option>
                                    @foreach($mems as $mem)
                                        <option value="{{ $mem->id_mem }}" {{ $mem->id_mem == $stock->mem_id ? 'selected' : '' }}>
                                            {{ $mem->tipoMem }}
                                        </option>
                                    @endforeach
                                </select>
                                {!! $errors->first('mem_id', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Disco Duro:') }}
                                <select class="form-control" name="disc_d">
                                    <option value="">Selecciona una Opcion ...</option>
                                    @foreach($discs as $disc)
                                        <option value="{{ $disc->id_disc }}" {{ $disc->id_disc == $stock->disc_d ? 'selected' : '' }}>
                                            {{ $disc->nomDis }}
                                        </option>
                                    @endforeach
                                </select>
                                {!! $errors->first('disc_d', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Estatus:') }}
                                <select class="form-control" name="estatus">
                                    <option value="">Selecciona una Opcion ...</option>
                                    <option value="stock" {{ $stock->Estatus == 'stock' ? 'selected' : '' }}>STOCK</option>
                                    <option value="baja" {{ $stock->Estatus == 'baja' ? 'selected' : '' }}>BAJA</option>
                                    <option value="asignado" {{ $stock->Estatus == 'asignado' ? 'selected' : '' }}>ASIGNADO</option>
                                </select>
                                {!! $errors->first('estatus', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-outline-primary">{{ __('Guardar') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection