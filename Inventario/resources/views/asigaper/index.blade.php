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
<div class="float-left">
    <a href="{{route ('home')}}" class="btn btn-outline-primary btn-sm ml-2" title="Volver"><i class="bi bi-arrow-left-circle" aria-hidden="true"></i></a> 
                             
</div>
                            <strong id="card_title text-center">
                                {{ __('Asignacion de Equipo-Personal') }}
                            </strong>

                             <div class="float-right">
                                @can('create-asigaper')
                                <a href="{{ route('asigaper.create') }}"title="Agregar" class="btn btn-outline-success btn-sm ml-2"><i class="bi bi-plus-circle"></i></a>
                      
                                
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
                                       <th class="border">Foto</th>
										<th class="border">N.Empleado</th>
                                        <th class="border">Nombre</th>
                                        <th class="border">Apellido</th>
                                        <th class="border">N.Activo</th>
									    <th class="border">Tipo</th>
                                        


                                        <th class="border" style="width: 250px;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asigapers as $asigaper)
                                        <tr>
                                        <td class="border" >
        <img src="/imagen/{{$asigaper->empleado ? $asigaper->empleado->foto_emple : 'N/A'}}" width="80" height="50" >

											<td class="border">{{$asigaper->empleado ? $asigaper->empleado->Clave_empleado : 'N/A'}}</td>
                                            <td class="border">{{$asigaper->empleado ? $asigaper->empleado->nombre : 'N/A'}}</td>
                                           	<td class="border">{{$asigaper->empleado ? $asigaper->empleado->apellidoP : 'N/A' }}</td>
                                            <td class="border">{{$asigaper->Nactivo ? $asigaper->Nactivo : 'N/A'}}</td>
                                            <td class="border">{{$asigaper->stock->tipo? $asigaper->stock->tipo->nomTipo : 'N/A'}}</td>
                                            <td class="border" style="width: 250px;">
                                                <form action="{{ route('asigaper.destroy',$asigaper->id_asigaper) }}" method="POST">
                                                    @can('show-asigaper')
                                                    <a class="btn btn-sm btn-outline-primary " href="{{ route('asigaper.show',$asigaper->id_asigaper) }}"><i class="fa bi-eye"></i> {{ __('Ver') }}</a>
                                                    @endcan
                                                    @can('edit-asigaper')
                                                    <a class="btn btn-sm btn-outline-warning" href="{{ route('asigaper.edit',$asigaper->id_asigaper) }}"><i class="fa fa-fw bi-pencil-square"></i> {{ __('Editar') }}</a>
                                                    @endcan
                                                    @can('delete-asigaper')
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Seguro que quieres eliminarlo?');" class="btn btn-outline-danger btn-sm"><i class="fa fa-fw bi-trash"></i> {{ __('Eliminar') }}</button>
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
