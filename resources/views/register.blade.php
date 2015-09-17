@extends('layouts.default')

@section('content')
    <h1>Iniciar Sesión</h1>
    @include('partials.errors')
    <form role="form" action="{{route('register_store_path')}}" method="post">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="name" class="form-control" name="name"
                   placeholder="Introduce tu nombre">
        </div>

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

        <div class="form-group">
            <label for="password">Repetir Contraseña</label>
            <input type="password" class="form-control" name="password_r"
                   placeholder="repite tu Contraseña">
        </div>

        <button type="submit" class="btn btn-primary">registrar</button>
    </form>
@stop
