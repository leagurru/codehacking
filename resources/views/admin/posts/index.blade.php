@extends('layouts.admin')
@section('content')
    <h1>Posteos</h1>

    <table class="table">
        <thead>
          <tr>
                <th>Post</th>
                <th>Imagen</th>
                <th>Usuario</th>
                <th>Category</th>
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
                  <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placeholder.it/400x400'}}" alt=""</td>
                  <td>{{$post->user->name}}</td>
                  {{--<td>{{$post->category_id}}</td>--}}
                  <td>{{$post->category ? $post->category->name : "Sin categoría"}}</td>
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