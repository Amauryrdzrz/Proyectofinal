@extends('layouts.app')

@section('template_title')
    {{ $disco->name ?? "{{ __('Show') Platillo" }}
@endsection

@section('content')
<div class="col-sm-12">
            <div class="card" style="left:25vw; width: 50%;">
              <div class="card-title" style="align-items:center; justify-content:center;">
                <h1>Eliminar Platillo</h1>
              </div>
                <img class="card-img-top" height=200px width=200px src="{{ $disco->archivo }}" alt="Card image cap">
                <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Platillo:</strong>
                            {{ $disco->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Nacionalidad:</strong>
                            {{ $disco->categoria }}
                        </div>
                        <div class="form-group">
                            <strong>Categoria:</strong>
                            {{ $disco->cantante }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $disco->precio }}
                        </div>
                        <form method="POST" action="{{ route('eliminarDisco',$disco->id) }}">
                            @csrf
                            @method('DELETE')

                            @if (Auth::user()->area < 3)
                                <label for="archivo">
                                   Codigo para eliminar
                                </label>
                                <input type="hidden" value="ELIMINAR" name="accion" codigo="accion">
                                <input type="number" value="" name="codigoS" id="codigoS" required>
                                <div>
                                    <button href="/solicitud?accion=ELIMINAR" class="btn btn-primary"> Solicitar código </button>
                                </div>
                            @endif
                            <div>
                            <button type="submit" class="btn btn-primary">Eliminar Platillo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('msg') == 'NOVPN')
    <script type="text/javascript">
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Esta intentando acceder a este modulo desde una red insegura, por favor utilice su VPN.',
            showConfirmButton: false,
            timer: 4000
        })
    </script>
@endif

@if (session('msg') == 'OK')
    <script type="text/javascript">
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Solicitud enviada, espera la respuesta de su administrador.',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@endif

@if (session('msg') == 'OTROUSU')
    <script type="text/javascript">
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Parece que estas intentado usar un codigo que no te pertenece, si necesitas un codigo solicita uno a tu administrador.',
            showConfirmButton: false,
            timer: 4000
        })
    </script>
@endif

@if (session('msg') == 'CADUCADO')
    <script type="text/javascript">
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Este codigo ya expiró, solicita otro codigo e intenta nuevamente.',
            showConfirmButton: false,
            timer: 4000
        })
    </script>
@endif

@if (session('msg') == 'CADUCADO2')
    <script type="text/javascript">
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Este codigo no es apto para esta funcion',
            showConfirmButton: false,
            timer: 4000
        })
    </script>
@endif

@endsection
