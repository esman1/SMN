@extends('layouts.app')

@section('template_title')
    Asigaper
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card text-center">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title text-center">
                                {{ __('Asignacion de Equipo-Personal') }}
                            </span>

                             <div class="float-right">
                                @can('create-asigaper')
                                <a href="{{ route('asigaper.create') }}" class="btn btn-outline-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Nuevo</a>
                      
                                
                            </a>
                                @endcan
                               
                               
                                 
                            <a href="{{route ('home')}}" class="btn btn-outline-secondary btn-sm ml-2"><i class="bi bi-house" aria-hidden="true"></i> Volver</a> 
                             
                              </div>
                              
                        </div>
                    </div>
                   

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle">
                                <thead class="thead">
                                    <tr>
                                       <th>Foto</th>
										<th>N.Empleado</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>N.Activo</th>
									    <th>Tipo</th>
                                        


                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asigapers as $asigaper)
                                        <tr>
                                        <td>
        <img src="/imagen/{{$asigaper->empleado ? $asigaper->empleado->foto_emple : 'N/A'}}" width="80" height="50" >

											<td>{{$asigaper->empleado ? $asigaper->empleado->Clave_empleado : 'N/A'}}</td>
                                            <td>{{$asigaper->empleado ? $asigaper->empleado->nombre : 'N/A'}}</td>
                                           	<td>{{$asigaper->empleado ? $asigaper->empleado->apellidoP : 'N/A' }}</td>
                                            <td>{{$asigaper->Nactivo ? $asigaper->Nactivo : 'N/A'}}</td>
                                            <td>{{$asigaper->stock ? $asigaper->stock->tipo->tipo : 'N/A'}}</td>
                                            <td>
                                                <form action="{{ route('asigaper.destroy',$asigaper->id_asigaper) }}" method="POST">
                                                    @can('show-asigaper')
                                                    <a class="btn btn-sm btn-outline-primary " href="{{ route('asigaper.show',$asigaper->id_asigaper) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    @endcan
                                                    @can('edit-asigaper')
                                                    <a class="btn btn-sm btn-outline-warning" href="{{ route('asigaper.edit',$asigaper->id_asigaper) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @endcan
                                                    @can('delete-asigaper')
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Seguro que quieres eliminarlo?');" class="btn btn-outline-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
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
                {!! $asigapers->links() !!}
            </div>
        </div>
    </div>
@endsection
