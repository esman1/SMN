@extends('layouts.app')

@section('template_title')
    Departamento
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
                                {{ __('Departamento') }}
                            </strong>

                             <div class="float-right">
                                  @can('create-departamento')
       
        <a href="{{ route('departamento.create') }}" class="btn btn-outline-success btn-sm ml-2" title="Agregar"><i class="bi bi-plus-circle"></i></a>
        
        @endcan              </div>
                        </div>
                    </div>
                   

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                       
										<th class="border">Clave</th>
										<th class="border">Departamento</th>
										<th class="border">Descripcion</th>

                                        <th class="border" style="width: 250px"> Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departamentos as $departamento)
                                        <tr>
                                           
											<td class="border">{{ $departamento->Clave_dep ? $departamento->Clave_dep : 'N/A' }}</td>
											<td class="border">{{ $departamento->Desc_corta_d ? $departamento->Desc_corta_d : 'N/A'}}</td>
											<td class="border">{{ $departamento->Desc_d ? $departamento->Desc_d : 'N/A'}}</td>

                                            <td class="border">
                                                <form action="{{ route('departamento.destroy',$departamento->id_depart) }}" method="POST">
                                                    @can('show-departamento')
                                                    <a class="btn btn-sm btn-outline-primary " href="{{ route('departamento.show',$departamento->id_depart) }}"><i class="fa fa-fw bi-eye"></i> {{ __('Ver') }}</a>
                                                    @endcan
                                                    @can('edit-departamento')
                                                    <a class="btn btn-sm btn-outline-warning" href="{{ route('departamento.edit',$departamento->id_depart) }}"><i class="fa fa-fw bi-pencil-square"></i> {{ __('Editar') }}</a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('delete-departamento')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-fw bi-trash"></i> {{ __('Eliminar ') }}</button>
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
                {!! $departamentos->links() !!}
            </div>
        </div>
    </div>
@endsection
