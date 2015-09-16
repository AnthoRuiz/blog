@extends('layouts.default')

@section('content')
    <h1>Iniciar Sesión</h1>

    @if($errors->has())
        <div class="alert alert-danger">
            <ul class="list-unstyled">
            @foreach($errors->all() as $error)
                   <li> {{$error}} </li>
            @endforeach
            </ul>
        </div>
    @endif

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
        <div class="checkbox">
            <label><input type="checkbox">Recuerdame</label>
        </div>

        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
@stop