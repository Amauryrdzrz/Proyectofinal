@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Platillo
@endsection

@section('content')

<div class="col-sm-12">
            <div class="card" style="left:25vw; width: 50%;">
              <div class="card-title" style="align-items:center; justify-content:center;">
                <h1>Editar Platillo</h1>
              </div>
                <img class="card-img-top" height=200px width=200px src="{{ $disco->archivo }}" alt="Card image cap">
                <div class="card-body">
                    <form  method="POST" action="{{ route('update', $disco->id) }}"  enctype="multipart/form-data">
                         @csrf
                         @method('PUT')
                        <div class="row">
                          <div class="col-md-3"></div>
                          <div class="form-group col-md-3">
                            <label for="nombre">Platillo</label>
                            <input type="text" value="{{$disco->nombre}}" name="nombre" id="nombre" class="form-control" required>
                            <label for="categoria">Nacionalidad</label>
                            <input value="{{$disco->categoria}}" name="categoria" id="categoria" class="form-control" required>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-3"></div>
                            <div class="form-group col-md-3">
                              <label for="cantante">Categoria</label>
                              <input type="text"  value="{{$disco->cantante}}" name="cantante" id="cantante" class="form-control" required>
                               <label for="precio">Precio</label>
                              <input type="text" class="form-control" value="{{$disco->precio}}" name="precio" id="precio" required>
                            </div>
                            <div class="form-group col-md-2">
                             
                            </div>
                          <div class="col-md-4"></div>
                        </div>
                        
                        <div class="row">
                          <div class="col-md-3"></div>
                          <div class="form-group col-md -4">
                            <label for="image">Imagen descriptiva</label>
                            <input type="file" value="{{$disco->archivo}}" name="image" id="image" class="form-control" required>
                          </div>
                          <div class="col-md-3"></div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-md-3"></div>
                             @if (Auth::user()->area == 1)
                                <div class="form-group col-md -4">
                                  <label for="codigoS">Código para editar.</label>
                                  <input type="number" value="" name="codigoS" id="codigoS" class="form-control" required>
                                  <a href="/solicitud?accion=EDITAR">Solicitar Código </a>
                                </div>
                            @endif
                            <div class="form-group col-md-2">
                            <br>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                          <div class="col-md-4"></div>
                        </div>

                      </form>
                    </div>
                </div>
            </div>
        </div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

@if (session('msg') == 'NOVALIDO')
    <script type="text/javascript">
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'El codigo que ingresó no es valido, por favor valide el dato e intentelo nuevamente.',
            showConfirmButton: false,
            timer: 4000
        })
    </script>
@endif

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

@endsection
