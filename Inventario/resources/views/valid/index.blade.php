@extends('layouts.app')
@section('content')
<div class="card">
<div class="card-title">
<label>Validacion de Informacion</label>
</div>
<div class="card-body">
    <form method="GET" action="{{ route('filter.index') }}">
        <select class="form-select" name="filter" aria-label="Default select example" onchange="this.form.submit()">
            <option selected value="">Open this select menu</option>
            <option value="empleados" {{ request()->get('filter') == 'empleados' ? 'selected' : '' }}>Empleados</option>
            <option value="stock" {{ request()->get('filter') == 'stock' ? 'selected' : '' }}>Stock</option>
            <option value="asigsuc" {{ request()->get('filter') == 'asigsuc' ? 'selected' : '' }}>AsigSuc</option>
            <option value="asigaper" {{ request()->get('filter') == 'asigaper' ? 'selected' : '' }}>AsigAper</option>
        </select>
    </form>
    
    <!-- Rest of your view content -->
    @if($items->isNotEmpty())
        @foreach($items as $item)
            <!-- Display your items here -->
            <p>{{ $item->name }}</p> <!-- Adjust according to the table structure -->
        @endforeach
    @else
        <p>No records found</p>
    @endif
    
    {{ $items->appends(request()->input())->links() }}
    
    
</div>
</div>
@endsection