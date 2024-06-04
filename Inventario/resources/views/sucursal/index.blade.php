@extends('layouts.app')

@section('template_title')
    Sucursal
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-center">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="float-left">
                            
                                <a class="btn btn-outline-primary btn-sm ml-2" href="javascript:history.back()" title="Volver">
                                    <i class="bi bi-arrow-left-circle"></i>
                                </a>
                            </div>
                            <strong id="card_title">
                                {{ __('Sucursal') }}
                            </strong>

                             <div class="float-right">
                                  @can('create-sucursal')
       
        <a href="{{ route('sucursal.create') }}" class="btn btn-outline-success btn-sm ml-2" title="Agregar"><i class="bi bi-plus-circle"></i></a>
        
        @endcan              </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                    
										<th class="border">Clave</th>
										<th class="border">Sucursal</th>

                                        <th style="width: 250px;" class="border">Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sucursals as $sucursal)
                                        <tr >
                                            
											
											<td class="border">{{ $sucursal->Clave_sucursal ? $sucursal->Clave_sucursal : 'N/A' }}</td>
											<td class="border">{{ $sucursal->Nom_sucursal ? $sucursal->Nom_sucursal: 'N/A' }}</td>

                                            <td class="border">
                                                <form action="{{ route('sucursal.destroy',$sucursal->id_sucursal) }}" method="POST">
                                                    @can('show-sucursal')
                                                    <a class="btn btn-sm btn-outline-primary " href="{{ route('sucursal.show',$sucursal->id_sucursal) }}"><i class="bi bi-eye"></i>{{ __(' Ver') }}</a>
                                                    @endcan
                                                    @can('edit-sucursal')
                                                    <a class="btn btn-sm btn-outline-warning" href="{{ route('sucursal.edit',$sucursal->id_sucursal) }}"><i class="bi bi-pencil-square"></i> {{ __(' Editar') }}</a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('delete-sucursal')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i> {{ __(' Eliminar') }}</button>
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
                {!! $sucursals->links() !!}
            </div>
        </div>
    </div>
@endsection
