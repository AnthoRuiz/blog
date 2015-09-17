@extends('layouts.default')

@section('content')
    <h1>Iniciar Sesión</h1>
    @include('partials.errors')
    <form role="form" action="{{route('auth_store_path')}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email"
                   placeholder="Introduce tu email">
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" name="password"
                   placeholder="Introduce tu Contraseña">
        </div>

        <button type="submit" class="btn btn-primary">Entrar</button>
        <a class="btn btn-primary" href="{{ route('register_show_path')}}" >registrarse</a>
    </form>
@stop