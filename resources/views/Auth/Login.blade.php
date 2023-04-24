@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="row mb-3"></div>
        <div class="row mb-3"></div>
        <div class="row mb-3"></div>
        <div class="row mb-3"></div>
        <div class="row mb-3"></div>
        <div class="row mb-3"></div>
        
            <div class="card">
                <div class="card-body">
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
                    <form method="POST" action="{{ route('session') }}">
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

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Iniciar Sesion') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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

@endsection

<script src="https://js.pusher.com/7.2/pusher.min.js"></script>

<script>
        Pusher.logToConsole = true;

        var pusher = new Pusher('44285c892edabb7d1cdf', {
        cluster: 'us2'
        });

        var channel = pusher.subscribe('home');
        channel.bind('my-event', function(data) {
        let message = JSON.stringify(data);

        console.log(message)
        
        });

</script>