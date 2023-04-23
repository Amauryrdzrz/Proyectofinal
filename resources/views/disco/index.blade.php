@extends('layouts.app')

@section('template_title')
    Disco
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Discos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Agregar nuevo') }}
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Categoria</th>
										<th>Cantante</th>
										<th>Precio</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($discos as $disco)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td>{{ $disco->nombre }}</td>
											<td>{{ $disco->categoria }}</td>
											<td>{{ $disco->cantante }}</td>
											<td>{{ $disco->precio }}</td>

                                            <td>
                                                <form action="{{ route('edit',$disco->id) }}" method="GET">
                                                    @csrf
                                                    @method('GET')
                                                    <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-fw fa-edit"></i> Editar </button>
                                                </form>
                                                <form action="{{ route('delete',$disco->id)}}" method="GET">
                                                    @csrf
                                                    @method('GET')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $discos->links() !!}
            </div>
        </div>
    </div>

@endsection
