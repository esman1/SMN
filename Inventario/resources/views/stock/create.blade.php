@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Stock
@endsection

@section('content')
<div class="container">
    <section class="row justify-content-center">
        <div class="col-md-8"> <!-- Corregido 'cold-md-8' a 'col-md-8' -->
            <div class="card">
                <div class="card-header">Ingresar Stock</div> <!-- Corregido 'Igresar Stock' a 'Ingresar Stock' -->
                <div class="card-body">
                    <form method="POST" action="{{ route('stock.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            {{ Form::label('N.Serie:') }}
                            {{ Form::text('Nserie', old('Nserie'), ['class' => 'form-control' . ($errors->has('Nserie') ? ' is-invalid' : ''), 'placeholder' => 'Nserie']) }}
                            {!! $errors->first('Nserie', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group">
                            {{ Form::label('Modelo:') }}
                            <select class="form-control" name="modelo_id">
                                <option value="">Selecciona una Opcion ...</option>
                                @foreach($modelos as $modelo)
                                    <option value="{{ $modelo->id_modelo }}" {{ old('modelo_id') == $modelo->id_modelo ? 'selected' : '' }}>
                                        {{ $modelo->nomMod }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {{ Form::label('Tipo:') }}
                            <select class="form-control" name="tipo_id">
                                <option value="">Selecciona una Opcion ...</option>
                                @foreach($tipos as $tipo)
                                    <option value="{{ $tipo->id_tipo }}" {{ old('tipo_id') == $tipo->id_tipo ? 'selected' : '' }}>
                                        {{ $tipo->nomTipo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {{ Form::label('Marca:') }}
                            <select class="form-control" name="marca_id">
                                <option value="">Selecciona una Opcion ...</option>
                                @foreach($marcas as $marca)
                                    <option value="{{ $marca->id_marca }}" {{ old('marca_id') == $marca->id_marca ? 'selected' : '' }}>
                                        {{ $marca->nomMar }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {{ Form::label('Sistema Operativo:') }}
                            <select class="form-control" name="sisop_id">
                                <option value="">Selecciona una Opcion ...</option>
                                @foreach($sisops as $sisop)
                                    <option value="{{ $sisop->id_sisop }}" {{ old('sisop_id') == $sisop->id_sisop ? 'selected' : '' }}>
                                        {{ $sisop->nomSis }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {{ Form::label('Procesador:') }}
                            <select class="form-control" name="proces_id">
                                <option value="">Selecciona una Opcion ...</option>
                                @foreach($proces as $proc)
                                    <option value="{{ $proc->id_proc }}" {{ old('proces_id') == $proc->id_proc ? 'selected' : '' }}>
                                        {{ $proc->nomProc }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {{ Form::label('Memoria:') }}
                            <select class="form-control" name="mem_id">
                                <option value="">Selecciona una Opcion ...</option>
                                @foreach($mems as $mem)
                                    <option value="{{ $mem->id_mem }}" {{ old('mem_id') == $mem->id_mem ? 'selected' : '' }}>
                                        {{ $mem->tipoMem }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {{ Form::label('Disco Duro:') }}
                            <select class="form-control" name="disc_d">
                                <option value="">Selecciona una Opcion ...</option>
                                @foreach($discs as $disc)
                                    <option value="{{ $disc->id_disc }}" {{ old('disc_d') == $disc->id_disc ? 'selected' : '' }}>
                                        {{ $disc->nomDis }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {{ Form::label('Estatus:') }}
                            <select class="form-control" name="estatus_id">
                                <option value="">Selecciona una Opcion ...</option>
                                @foreach($estatus as $est)
                                    <option value="{{ $est->id_estat }}" {{ old('estatus_id') == $est->id_estat ? 'selected' : '' }}>
                                        {{ $est->estat }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="box-footer mt20">
                            <button type="submit" class="btn btn-outline-primary">{{ __('Guardar') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
