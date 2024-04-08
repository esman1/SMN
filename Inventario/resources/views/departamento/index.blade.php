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

                            <span id="card_title">
                                {{ __('Departamento') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('departamento.create') }}" class="btn btn-outline-success btn-sm float-right"  data-placement="left">
                                  {{ __('+') }}
                                </a>
                              </div>
                        </div>
                    </div>
                   

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                       
										<th>Clave</th>
										<th>Departamento</th>
										<th>Descripcion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departamentos as $departamento)
                                        <tr>
                                           
											<td>{{ $departamento->Clave_dep ? $departamento->Clave_dep : 'N/A' }}</td>
											<td>{{ $departamento->Desc_corta_d ? $departamento->Desc_corta_d : 'N/A'}}</td>
											<td>{{ $departamento->Desc_d ? $departamento->Desc_d : 'N/A'}}</td>

                                            <td>
                                                <form action="{{ route('departamento.destroy',$departamento->id_depart) }}" method="POST">
                                                    <a class="btn btn-sm btn-outline-primary " href="{{ route('departamento.show',$departamento->id_depart) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-outline-warning" href="{{ route('departamento.edit',$departamento->id_depart) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar ') }}</button>
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