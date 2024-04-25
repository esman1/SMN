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
                                <a href="{{route ('home')}}" class="btn btn-outline-primary btn-sm ml-2" title="Volver"><i class="bi bi-arrow-left-circle" aria-hidden="true"></i></a> 
                             
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
                            <table class="table table-striped table-hover align-middle">
                                <thead class="thead">
                                    <tr>
 

                                
										<th class="border">N.Serie</th>
										<th class="border">Modelo </th>
										<th class="border">Tipo </th>
										<th class="border">Marca</th>
										<th class="border">Sistema Operativo</th>
										<th class="border">Procesador</th>
										<th class="border">Memoria</th>
										<th class="border">Disco Duro</th>

                                        <th class="border" style="width: 250px;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stocks as $stock)
                                        <tr>
                                           
											<td class="border">{{ $stock->Nserie }}</td>
											<td class="border">{{ $stock->modelo ? $stock->modelo->nomMod : 'N/A' }}</td>
											<td class="boder">{{ $stock->tipo ? $stock->tipo->nomTipo : 'N/A' }}</td>
											<td class="border">{{ $stock->marca ? $stock->marca->nomMar : 'N/A' }}</td>
											<td class="border">{{ $stock->sisop ? $stock->sisop->nomSis : 'N/A' }}</td>
											<td class="border">{{ $stock->procesador ? $stock->procesador->nomProc : 'N/A' }}</td>
											<td class="border">{{ $stock->memoria ? $stock->memoria->tipoMem: 'N/A' }}</td>
											<td class="border">{{ $stock->discod ? $stock->discod->nomDis : 'N/A' }}</td>

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
                                                    <button type="submit" class="btn btn-outline-danger btn-sm"onclick="return confirm('Seguro que quieres eliminarlo?');"><i class="bi bi-trash"></i> {{ __('Eliminar') }}</button>
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
                {!! $stocks->links() !!}
            </div>
        </div>
    </div>
@endsection
