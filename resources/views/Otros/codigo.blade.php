@extends('layouts.app')
@section('content')
<div class="container">
<div class="row mb-3"></div>
<div class="row mb-3"></div>
<div class="row mb-3"></div>
<div class="row mb-3"></div>
<div class="row mb-3"></div>
<div class="row mb-3"></div>
<div class="row mb-3"></div>
<div class="row mb-3"></div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('logeocodigo') }}">
                        @csrf
                        <center><h2>Codigo de seguridad</h2></center>
                         <br>
                        <div class="row mb-3">
                        <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <input id="codigo" type="number" class="form-control @error('codigo') is-invalid @enderror" name="codigo" value="{{ old('email') }}"
                                required placeholder="Ingrese su codigo de seguridad" autofocus style="text-align:center;">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                        <div class="col-md-5"></div>
                            <div class="col-md-4">
                                <button class="btn btn-primary" type="submit">Validar codigo</button>
                            </div>
                            <div class="col-md-5"></div>
                        </div>
                        <div class="row mb-3"></div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/Login.css">
    <script src="/js/Login.js"></script>
    <title>Xent</title>
</head>
<body>
    <div class="padre">
        <div class="bodyL">
             <div class="box">
                <form class="form" method="POST" action="{{route('logeocodigo')}}">
                    @csrf
                    <img src="/Image/Xent logo.png" alt="">
                    <div class="email">
                         <center><h2>Codigo de seguridad</h2></center>
                         <br>
                         <input class="Correo" type="number" name="codigo" id="codigo" placeholder="Ingrese su codigo de seguridad" required="required">
                         @error('email')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="button">
                       <button class="BtnR" type="submit">Validar codigo</button>
                    </div>
                </form>
             </div>
        </div>
    </div>
</body> -->