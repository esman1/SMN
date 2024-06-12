@extends('layouts.app')

@section('content')
    <div class="container">
        <div id='calendar'></div>
        
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [
                    // Aquí puedes cargar los eventos desde tu base de datos o cualquier otra fuente de datos
                    {
                        title: 'Evento 1',
                        start: '2024-05-01'
                    },
                    {
                        title: 'Evento 2',
                        start: '2024-05-05'
                    }
                    // Agrega más eventos según sea necesario
                ]
            });

            calendar.render();
        });
    </script>
@endpush
