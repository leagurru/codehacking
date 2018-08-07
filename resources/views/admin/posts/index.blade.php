@extends('layouts.admin')
@section('content')
    <h1>Posteos</h1>

    <table class="table">
        <thead>
          <tr>
                <th>Id Post</th>
                <th>Id Usuario</th>
                <th>Id Categ</th>
                <th>Id Photo</th>
                <th>Título</th>
                <th>Cuerpo</th>
                <th>Creado</th>
                <th>Actualizado</th>
          </tr>
        </thead>

        <tbody>
        @if($posts)
            @foreach($posts as $post)

              <tr>
                  <td>{{$post->id}}</td>
                  <td>{{$post->user_id}}</td>
                  <td>{{$post->category_id}}</td>
                  <td>{{$post->photo_id}}</td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->body}}</td>
                  <td>{{$post->created_at->diffForHumans()}}</td>
                  <td>{{$post->updated_at}}</td>
              </tr>
          @endforeach
        @endif



        </tbody>
    </table>

@stop