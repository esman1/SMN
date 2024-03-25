@extends('layouts.app')

@section('template_title')
    Sucursal
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-center">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Sucursal') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('sucursal.create') }}" class="btn btn-outline-success btn-sm float-right"  data-placement="left">
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
                                    
										<th class="border">Clave</th>
										<th class="border">Sucursal</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sucursals as $sucursal)
                                        <tr >
                                            
											
											<td class="border">{{ $sucursal->Clave_sucursal ? $sucursal->Clave_sucursal : 'N/A' }}</td>
											<td class="border">{{ $sucursal->Nom_sucursal ? $sucursal->Nom_sucursal: 'N/A' }}</td>

                                            <td>
                                                <form action="{{ route('sucursal.destroy',$sucursal->id_sucursal) }}" method="POST">
                                                    <a class="btn btn-sm btn-outline-primary " href="{{ route('sucursal.show',$sucursal->id_sucursal) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-outline-warning" href="{{ route('sucursal.edit',$sucursal->id_sucursal) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $sucursals->links() !!}
            </div>
        </div>
    </div>
@endsection
