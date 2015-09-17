@extends('layouts.default')

@section('content')
    <h1>Bienvenido a nuestro blog</h1>
    <a class="btn btn-primary" href="{{ route('post_create_path')}}" >Crear Post</a>

    <a class="btn btn-primary" href="{{ route('post_list_path')}}" >Ver Posts</a>
    <hr>
@stop
