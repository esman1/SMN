@extends('layouts.app')

@section('template_title')
    Puesto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-center">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="float-left">
                                <a href="{{ route('home') }}" class="btn btn-outline-primary btn-sm ml-2" title="Volver"><i class="bi bi-arrow-left-circle"></i></a>
        
                            </div>
                            <strong id="card_title">
                                {{ __('Puesto') }}
                            </strong>

                             <div class="float-right">
                                  @can('create-puesto')
       
        <a href="{{ route('puesto.create') }}" class="btn btn-outline-success btn-sm ml-2" title="Agregar"><i class="bi bi-plus-circle"></i></a>
        
        @endcan              </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        
										<th class="border">Clave</th>
										<th class="border">Puesto</th>
										<th class="border">Descripcion</th>

                                <th class="border" style="width: 250px">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($puestos as $puesto)
                                        <tr>
                                            
											<td class="border">{{ $puesto->Clave_puesto }}</td>
											<td class="border">{{ $puesto->Des_cort_p }}</td>
											<td class="border">{{ $puesto->descripcion }}</td>

                                            <td>
                                                <form action="{{ route('puesto.destroy',$puesto->id_puesto) }}" method="POST">
                                                    @can('show-puesto')
                                                    <a class="btn btn-sm btn-outline-primary " href="{{ route('puesto.show',$puesto->id_puesto) }}"><i class="bi bi-eye"></i> {{ __('Ver') }}</a>
                                                    @endcan
                                                    @can('edit-puesto')
                                                    <a class="btn btn-sm btn-outline-warning" href="{{ route('puesto.edit',$puesto->id_puesto) }}"><i class="bi bi-pencil-square"></i> {{ __('Editar') }}</a>
                                                  @endcan
                                                    @can('delete-puesto')
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i> {{ __('Eliminar') }}</button>
                                                @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $puestos->links() !!}
            </div>
        </div>
    </div>
@endsection
