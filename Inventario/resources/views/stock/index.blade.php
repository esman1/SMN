@extends('layouts.app')

@section('template_title')
    Stock
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
                                {{ __('Stock') }}
                            </strong>

                             <div class="float-right">
                                @can('create-stock')
                                <a href="{{ route('stock.create') }}"title="Agregar" class="btn btn-outline-success btn-sm ml-2"><i class="bi bi-plus-circle" aria-hidden="true"></i></a>
                      
                                
                                </a>
                                @endcan
                                 
                           
                              </div>
                             
                        </div>
                    </div>
                  

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle ">
                                <thead class="thead">
                                    <tr class="text-uppercase">
 

                                
										<th class="border">N.Serie</th>
										<th class="border">Modelo </th>
										<th class="border">Tipo </th>
										<th class="border">Marca</th>
										<th class="border">Sistema Operativo</th>
										<th class="border">Procesador</th>
										<th class="border">Memoria</th>
										<th class="border">Disco Duro</th>
                                        <th class="border">Estatus</th>

                                        <th class="border" style="width: 250px;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stocks as $stock)
                                    @if($stock->estatusv == 'validado')
                                        <tr>
                                           
											<td class="border text-uppercase">{{ $stock->Nserie }}</td>
											<td class="border text-uppercase">{{ $stock->modelo ? $stock->modelo->nomMod : 'N/A' }}</td>
											<td class="boder text-uppercase">{{ $stock->tipo ? $stock->tipo->nomTipo : 'N/A' }}</td>
											<td class="border text-uppercase">{{ $stock->marca ? $stock->marca->nomMar : 'N/A' }}</td>
											<td class="border text-uppercase">{{ $stock->sisop ? $stock->sisop->nomSis : 'N/A' }}</td>
											<td class="border text-uppercase">{{ $stock->procesador ? $stock->procesador->nomProc : 'N/A' }}</td>
											<td class="border text-uppercase">{{ $stock->memoria ? $stock->memoria->tipoMem: 'N/A' }}</td>
											<td class="border text-uppercase">{{ $stock->discod ? $stock->discod->nomDis : 'N/A' }}</td>
                                            <td class="border text-uppercase"> 
                                                @php
                                                    $estatus = strtolower($stock->Estatus);
                                                @endphp
                                            
                                                @if($estatus == 'stock')
                                                    <label class="text-warning">{{ $stock->Estatus ? $stock->Estatus : 'N/A'}}</label>
                                                @elseif($estatus == 'asignado')
                                                    <label class="text-success">{{ $stock->Estatus ? $stock->Estatus : 'N/A' }}</label>
                                                @elseif($estatus == 'baja')
                                                    <label class="text-danger">{{ $stock->Estatus ? $stock->Estatus : 'N/A' }}</label>
                                                @else
                                                @endif
                                            </td>
                                            
                                            <td>
                                                <form action="{{ route('stock.destroy',$stock->id_stock) }}" method="POST">
                                                   @can('show-stock')
                                                    <a class="btn btn-sm btn-outline-primary " href="{{ route('stock.show',$stock->id_stock) }}"><i class="bi bi-eye"></i> {{ __('Ver') }}</a>
                                                   @endcan
                                                   @can('edit-stock')
                                                    <a class="btn btn-sm btn-outline-warning" href="{{ route('stock.edit',$stock->id_stock) }}"><i class="bi bi-pencil-square"></i> {{ __('Editar') }}</a>
                                                   @endcan
                                                   @can('delete-stock')     
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $stock->id_stock }}"><i class="bi bi-trash"></i> {{__('Eliminar')}}</button>
                                                   @endcan
                                                </form>
                                            </td>
                                        </tr>
                                        @endif

                                        <div class="modal fade" id="deleteModal{{ $stock->id_stock }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $stock->id_stock }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $stock->id_stock }}">Confirmar Eliminación</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Estás seguro de que quieres eliminar a este registro?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                        <form action="{{ route('empleado.destroy', $stock->id_stock) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $stocks->links() !!}
            </div>
            
        </div>
    </div>
@endsection
