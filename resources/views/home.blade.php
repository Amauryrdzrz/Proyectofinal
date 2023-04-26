@extends('layouts.app')

@section('content')
<div class="container-fluid" style="margin-top:10%;">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Platillos
                            </span>

                             <div class="float-right">
                                <a href="{{ route('create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  Nuevo Platillo
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    
                    </div>
                </div>
                {!! $discos->links() !!}
            </div>
        </div>
    </div>
</div>
<div style="display:flex; flex-direction:row; margin:5%;">
            <div class="card" style="width: 18rem;">
                @foreach ($discos as $disco)
                    <img class="card-img-top" style="width:20%; height:20%;" src="{{ $disco->archivo }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Nombre: {{$disco->nombre}}</h5>
                            <p class="card-text">Nacionalidad: {{$disco->categoria}}**</p>
                            <p class="card-text">Categoria: {{$disco->cantante}}**</p>
                            <p class="card-text">Precio: ${{$disco->precio}}</p>
                        <div style="display:flex; flex-direction:row;">
                            <form action="{{ route('edit',$disco->id) }}" method="GET">
                                @csrf
                                @method('GET')
                                <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-fw fa-edit"></i>Editar</button>
                            </form>
                            <form action="{{ route('delete',$disco->id)}}" method="GET">
                                @csrf
                                @method('GET')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>Eliminar</button>
                            </form>
                        </div>
                        </div>
                        </div>
                        @endforeach
@endsection
