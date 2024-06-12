@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Eventos</h1>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
    
        <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="flexSwitchChekDefault">
        <label class="form-check-label" for="notificationsToggle">Notifications Enabled</label>
            
            
        </div>
</div>

@canany('show-user')

        <a href="{{ route('event.create') }}" class="btn btn-primary">+ Agregar Evento</a>
  @endcanany

    </div>

    <div class="row">
        @foreach($events as $event)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text">{{ $event->description }}</p>
                        <p class="card-text">
                            <strong>Fecha:</strong> {{ optional($event->start_time)->format('d/m/Y') }}
                        </p>
                        <p class="card-text">
                            <strong>Hora:</strong> {{ optional($event->start_time)->format('h:i A') }}
                        </p>
                        <a href="#" class="btn btn-secondary btn-sm">Desactivar Notificaciones</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="input-group mt-3">
        <input type="text" class="form-control" placeholder="6/6/2024" aria-label="Fecha" aria-describedby="button-addon2">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                <i class="fa fa-calendar"></i>
            </button>
        </div>
    </div>

</div>

<style>
    .card-body {
        text-align: center;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
    }

    .card-text {
        font-size: 1rem;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .input-group {
        max-width: 300px;
        margin: auto;
    }

    .input-group .form-control {
        border-right: 0;
    }

    .input-group .btn {
        border-left: 0;
    }
</style>

<script>
    document.getElementById('notificationsToggle').addEventListener('change', function() {
        if (this.checked) {
            console.log('Notifications Enabled');
        } else {
            console.log('Notifications Disabled');
        }
    });
</script>

@endsection
