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
                        @csrf
                        <div class="row mb-3"></div>
                        <div class="row mb-3"></div>
                        <div class="row mb-3">
                            <div class="col-md-4"></div>
                            <div class="col-md-4"><img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fupload.wikimedia.org%2Fwikipedia%2Fcommons%2Fthumb%2Fa%2Faf%2FSquare_Enix_logo.svg%2F2560px-Square_Enix_logo.svg.png&f=1&nofb=1&ipt=510f7cb67c4dbb07eaf36e2169a4d10423cefad55131305750c7b13e6158e341&ipo=images"
                                 alt="" style="height:256; width:256px"></div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="row mb-3"></div>
                        <div class="row mb-3"></div>
                        <center><h2>Codigo de seguridad</h2></center>
                         <br>
                        <div class="row mb-3">
                        <div class="col-md-3"></div>
                            <div class="col-md-6">
                               <center><h4 class="mt-6 text-xl text-gray-900 dark:text-white">SU CODIGO PARA <b><u>{{$utilidad}}</u></b> ES</h4></center>
                                 <br>
                                <center><b><h1 class="underline mt-12 text-xl font-bold text-gray-900 dark:text-white" style="font-style: bol;"> <u>{{ $codigo }}</u> </h1></b></center>
                            </div>
                        </div>
                        <div class="row mb-3">
                        <div class="row mb-3"></div>
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
                <form class="form">
                    <img src="/Image/Xent logo.png" alt="">
                    <div class="email">
                       <center><h4 class="mt-6 text-xl text-gray-900 dark:text-white">SU CODIGO PARA {{$utilidad}} ES</h4></center>
                       <br>
                       <center><b><h1 class="underline mt-12 text-xl font-bold text-gray-900 dark:text-white"> {{ $codigo }} </h1></b></center>
                    </div>
                </form>
             </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('msg') == 'BADREQUEST')
<script type="text/javascript">
    Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'credenciales no validas',
    })
</script>
@endif

@if (session('msg') == 'STATUSFALSE')
<script type="text/javascript">
    Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Usuario deshabilitado ',
    })
</script>
@endif

@if (session('msg') == 'singOut')
<script type="text/javascript">
        Swal.fire({
        position: 'center',
        icon: 'success',
        title:'Adios',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif
</html> -->