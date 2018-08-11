@extends('layouts.admin')
@section('content')

@if(count($comments) > 0 )

    <h1>Comentarios</h1>

    <table class="table">
        <thead>
          <tr>
              <th>id</th>
              <th>Autor</th>
              <th>Email</th>
              <th>Comentario</th>
          </tr>
        </thead>
        <tbody>

        @foreach($comments as $comment)
          <tr>
              <td>{{$comment->id}}</td>
              <td>{{$comment->author}}</td>
              <td>{{$comment->email}}</td>
              <td>{{$comment->body}}</td>
              <td><a href="{{route('home.post', $comment->post->id)}}">Ver Post</a></td>
          </tr>

        @endforeach
        </tbody>
    </table>
    @else
    <h1 class="text-center">No hay comentarios</h1>

    @endif

@stop