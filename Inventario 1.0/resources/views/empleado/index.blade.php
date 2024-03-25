@extends('layouts.app')

@section('template_title')
    Empleado
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-center">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Empleado') }}
                            </span>
                            @can('create-empleado')
                             <div class="float-right">
                                  <a href="{{ route('empleado.create') }}" class="btn btn-outline-success btn-sm float-right"  data-placement="left">
                                  {{ __('+') }}
                                </a>
                              </div>
                              @endcan
                        </div>
                    </div>
                  

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle table-bordered">
                                <thead class="thead">
                                    <tr>
                                        <th>Foto</th>
										<th>N.Empleado</th>
										<th>Nombre</th>
										<th>Apellidop</th>
										<th>Apellidom</th>
										<th>Puesto</th>
										<th>Departamento</th>
										<th>Sucursal</th>
										

                                        <th style="width: 250px;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($empleados as $empleado)
                                        <tr>
                                     
                                        <td>
        <img src="/imagen/{{$empleado->foto_emple}}" width="80" height="50" >
    </td>
                                        <td>{{$empleado->Clave_empleado}}</td>
                                            <td>{{ $empleado->nombre }}</td>
											<td>{{ $empleado->apellidoP }}</td>
											<td>{{ $empleado->apellidoM }}</td>
										    <td>{{ $empleado->puesto ? $empleado->puesto->descripcion : 'N/A' }}</td>
											<td>{{$empleado->departamento ? $empleado->departamento->Desc_corta_d : 'N/A' }}</td>
                                            <td>{{ $empleado->sucursal ? $empleado->sucursal->Nom_sucursal : 'N/A' }}</td>
											

                                            <td>
                                                <form action="{{ route('empleado.destroy',$empleado->id_empleado) }}" method="POST">
                                                    @can('show-empleado')
                                                    <a class="btn btn-sm btn-outline-primary " href="{{ route('empleado.show',$empleado->id_empleado) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    @endcan
                                                    @can('edit-empleado')
                                                    <a class="btn btn-sm btn-outline-warning" href="{{ route('empleado.edit',$empleado->id_empleado) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @endcan
                                                    @can('delete-empleado')
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Seguro que quieres eliminarlo?');"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
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
                {!! $empleados->links() !!}
            </div>
        </div>
    </div>
@endsection
