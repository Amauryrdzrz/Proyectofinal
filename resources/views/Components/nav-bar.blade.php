<div>
    <header class="header">
        <nav class="Navbar">
            <a href="/dashboard"></a>
            <p class="Title">Bienvenido {{Auth::user()->name}}</p>
            <div class="closeSession">
                <a href="{{url('users/singOut')}}">Cerrar Sesión</a>
            </div>
        </nav>
    </header>
</div>
