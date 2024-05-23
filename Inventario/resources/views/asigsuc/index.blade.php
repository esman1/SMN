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
                                <a href="{{ route('asigsuc.create') }}"title="Agregar" class="btn btn-outline-success btn-sm ml-2"><i class="bi bi-plus-circle"></i></a>
                      
                                
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
                                       <td class="border">{{$asigsuc->nFol ? $asigsuc->nFol : 'n/A'}}</td>
        								<td class="border">{{$asigsuc->sucursal ? $asigsuc->sucursal->Nom_sucursal : 'N/A'}}</td>
                                            	<td class="border">{{$asigsuc->created_at ? $asigsuc->created_at : 'N/A' }}</td>
                                           
                                            
                                            <td class="border" style="width: 250px;">
                                                <form action="{{ route('asigsuc.destroy',$asigsuc->id_asigsuc) }}" method="POST">
                                                    @can('show-asigsuc')
                                                    <a class="btn btn-sm btn-outline-primary " href="{{ route('asigsuc.show',$asigsuc->id_asigsuc) }}"><i class="fa bi-eye"></i> {{ __('Ver') }}</a>
                                                    @endcan
                                                    @can('edit-asigsuc')
                                                    <a class="btn btn-sm btn-outline-warning" href="{{ route('asigsuc.edit',$asigsuc->id_asigsuc) }}"><i class="fa fa-fw bi-pencil-square"></i> {{ __('Editar') }}</a>
                                                    @endcan
                                                    @can('delete-asigsuc')
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Seguro que quieres eliminarlo?');" class="btn btn-outline-danger btn-sm"><i class="fa fa-fw bi-trash"></i> {{ __('Eliminar') }}</button>
                                                @endcan
                                                </form>
                                            </td>
                                        </tr>
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
