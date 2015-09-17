@extends('layouts.default')

@section('content')

    <h1>{{ $post->title }}</h1>
    <br>
    <p class="lead">{{ $post->body  }} </p>
    <a class="btn btn-primary" href="{{ route('post_list_path')}}" >Ver Posts</a>


@stop