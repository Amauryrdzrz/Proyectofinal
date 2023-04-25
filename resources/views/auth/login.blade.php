@extends('layouts.app')

@section('content')
<div class="container">
    <div style="margin-top: 10%; margin-left:5%; width:90%; padding: 70px 30px 44px; border-radius: 24px; background: white; text-align:center;">
        <h1>Bienvenido!</h1>
        <form style="width: 100%; margin: 0; display:grid; gap:16px;" method="POST" action="{{ route('session') }}">
            @csrf
            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo electronico') }}</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
            </div>
            <div style="width:100%; align-items:center; justify-content:center;">
                <button type="submit" style="width:50%" class="btn btn-primary">
                    Iniciar Sesión
                </button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('msg') == 'NO')
    <script type="text/javascript">
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Correo o contraseña incorrectas, intentelo nuevamente.',
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
            title: 'Esta intentando acceder a este sitio desde una red insegura, por favor utilice su VPN.',
            showConfirmButton: false,
            timer: 4000
        })
    </script>
@endif

@endsection