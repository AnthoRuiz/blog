@extends('layouts.default')

@section('content')
    <h1>Estos son nuestos posts </h1>
    <a class="btn btn-primary" href="{{ route('post_create_path')}}" >Crear Post</a>
    @include('partials.errors')

    <ul class="list-unstyled">
        <br>
        @foreach($posts as $post)
            <li>
                <p class="lead">
                    <a href="{{ route('post_show_path', $post->id) }}">
                        {{ $post->title }}
                    </a>

                    @if($currentUser->id  == $post->user->id)
                        <a class="btn btn-primary" href="{{ route('post_edit_path', $post->id) }}">editar</a>

                        {!! Form::open(['method' => 'DELETE', 'route' =>['post_delete_path', $post->id]]) !!}
                            <div class="form-group">
                                {!! Form::Submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                            </div>
                        {!! Form::close() !!}
                    @endif

                </p>
                <br>
                autor: {{ $post->user->name }}
                <br>
                creado: {{ $post->created_at }}
                <hr>
            </li>
        @endforeach
    </ul>
@stop