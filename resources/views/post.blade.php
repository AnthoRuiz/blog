@extends('layouts.default')

@section('content')

    <h1>{{ $post->title }}</h1>
    <br>
    <p class="lead">{{ $post->body  }} </p>
@stop