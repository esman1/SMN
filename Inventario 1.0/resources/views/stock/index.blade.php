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
                                <a href="{{ route('stock.create') }}" class="btn btn-outline-success btn-sm float-right"  data-placement="left">
                                  {{ __('+') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

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

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stocks as $stock)
                                        <tr>
                                           
											<td>{{ $stock->Nserie }}</td>
											<td>{{ $stock->modelo ? $stock->modelo->modelo : 'N/A' }}</td>
											<td>{{ $stock->tipo ? $stock->tipo->tipo : 'N/A' }}</td>
											<td>{{ $stock->marca ? $stock->marca->marca : 'N/A' }}</td>
											<td>{{ $stock->sisop ? $stock->sisop->nomSis : 'N/A' }}</td>
											<td>{{ $stock->procesador ? $stock->procesador->nomProc : 'N/A' }}</td>
											<td>{{ $stock->memoria ? $stock->memoria->tipoMem: 'N/A' }}</td>
											<td>{{ $stock->discod ? $stock->discod->nomDis : 'N/A' }}</td>

                                            <td>
                                                <form action="{{ route('stock.destroy',$stock->id_stock) }}" method="POST">
                                                    <a class="btn btn-sm btn-outline-primary " href="{{ route('stock.show',$stock->id_stock) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-outline-warning" href="{{ route('stock.edit',$stock->id_stock) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
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
