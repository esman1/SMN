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

                            <span id="card_title">
                                {{ __('Stock') }}
                            </span>

                             <div class="float-right">
                                @can('create-stock')
                                <a href="{{ route('stock.create') }}" class="btn btn-outline-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Nuevo</a>
                      
                                
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
 

                                
										<th>N.Serie</th>
										<th>Modelo </th>
										<th>Tipo </th>
										<th>Marca</th>
										<th>Sistema Operativo</th>
										<th>Procesador</th>
										<th>Memoria</th>
										<th>Disco Duro</th>

                                        <th style="width: 250px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stocks as $stock)
                                        <tr>
                                           
											<td>{{ $stock->Nserie }}</td>
											<td>{{ $stock->modelo ? $stock->modelo->nomMod : 'N/A' }}</td>
											<td>{{ $stock->tipo ? $stock->tipo->nomTipo : 'N/A' }}</td>
											<td>{{ $stock->marca ? $stock->marca->nomMar : 'N/A' }}</td>
											<td>{{ $stock->sisop ? $stock->sisop->nomSis : 'N/A' }}</td>
											<td>{{ $stock->procesador ? $stock->procesador->nomProc : 'N/A' }}</td>
											<td>{{ $stock->memoria ? $stock->memoria->tipoMem: 'N/A' }}</td>
											<td>{{ $stock->discod ? $stock->discod->nomDis : 'N/A' }}</td>

                                            <td>
                                                <form action="{{ route('stock.destroy',$stock->id_stock) }}" method="POST">
                                                   @can('show-stock')
                                                    <a class="btn btn-sm btn-outline-primary " href="{{ route('stock.show',$stock->id_stock) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                   @endcan
                                                   @can('edit-stock')
                                                    <a class="btn btn-sm btn-outline-warning" href="{{ route('stock.edit',$stock->id_stock) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                   @endcan
                                                   @can('delete-stock')
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm"onclick="return confirm('Seguro que quieres eliminarlo?');"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
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
