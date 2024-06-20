@extends('layouts.app')

@section('template_title')
    Asigsuc
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card text-center">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="float-left">
                                <a class="btn btn-outline-primary btn-sm ml-2" href="javascript:history.back()" title="Volver">
                                    <i class="bi bi-arrow-left-circle"></i>
                                </a>
                            </div>
                            <strong id="card_title text-center">
                                {{ __('Asignacion de Equipo-Sucursal') }}
                            </strong>
                            <div class="float-right">
                                @can('create-asigsuc')
                                    <a href="{{ route('asigsuc.create') }}" title="Agregar" class="btn btn-outline-success btn-sm ml-2">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle">
                                <thead class="thead">
                                    <tr>
                                        <th class="border">Folio</th>
                                        <th class="border">Sucursal</th>
                                        <th class="border">Fecha de Asignacion</th>
                                        <th class="border" style="width: 250px;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asigsucs as $asigsuc)
                                        @if ($asigsuc->estatusv == 'validado')
                                            <tr>
                                                <td class="border">{{ $asigsuc->nFol ? $asigsuc->nFol : 'n/A' }}</td>
                                                <td class="border">{{ $asigsuc->sucursal ? $asigsuc->sucursal->Nom_sucursal : 'N/A' }}</td>
                                                <td class="border">{{ $asigsuc->created_at ? $asigsuc->created_at : 'N/A' }}</td>
                                                <td class="border" style="width: 250px;">
                                                    @can('show-asigsuc')
                                                        <a class="btn btn-sm btn-outline-primary" href="{{ route('asigsuc.show', $asigsuc->id_asigsuc) }}">
                                                            <i class="fa bi-eye"></i> {{ __('Ver') }}
                                                        </a>
                                                    @endcan
                                                    @can('edit-asigsuc')
                                                        <a class="btn btn-sm btn-outline-warning" href="{{ route('asigsuc.edit', $asigsuc->id_asigsuc) }}">
                                                            <i class="fa fa-fw bi-pencil-square"></i> {{ __('Editar') }}
                                                        </a>
                                                    @endcan
                                                    @can('delete-asigsuc')
                                                        <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $asigsuc->id_asigsuc }}">
                                                            <i class="fa fa-fw bi-trash"></i> {{ __('Eliminar') }}
                                                        </button>
                                                    @endcan
                                                </td>
                                            </tr>

                                            <!-- Modal de confirmación de eliminación -->
                                            <div class="modal fade" id="deleteModal{{ $asigsuc->id_asigsuc }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $asigsuc->id_asigsuc }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel{{ $asigsuc->id_asigsuc }}">Confirmar Eliminación</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ¿Estás seguro de que quieres eliminar este registro?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                            <form action="{{ route('asigsuc.destroy', $asigsuc->id_asigsuc) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $asigsucs->links() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modals = document.querySelectorAll('.modal');
        modals.forEach(modal => {
            modal.addEventListener('hide.bs.modal', function (event) {
                console.log('Modal is closing:', event.target.id);
            });
        });
    });
</script>
@endsection