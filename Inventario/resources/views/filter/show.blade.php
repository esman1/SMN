@extends('layouts.app')

@section('template_title')
    Detalle del {{ ucfirst($filter) }}
@endsection

@section('content')
    <div class="container">
        <h1>Detalle del {{ ucfirst($filter) }}</h1>

        @if ($filter == 'empleados')
            @include('filter.partials.empleados', ['data' => $data])
        @elseif ($filter == 'stock')
            @include('filter.partials.stock', ['data' => $data])
        @elseif ($filter == 'asigaper')
            @include('filter.partials.asigaper', ['data' => $data])
        @elseif ($filter == 'asigsuc')
            @include('filter.partials.asigsuc', ['data' => $data])
        @else
            <p>Tipo de filtro no reconocido.</p>
        @endif
    </div>
@endsection
