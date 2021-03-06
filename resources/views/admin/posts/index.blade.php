@extends('layouts.admin')
@section('content')
    <h1>Posteos</h1>

    <table class="table">
        <thead>
          <tr>
                <th>Post</th>
                <th>Imagen</th>
                <th>Título</th>
                <th>Usuario</th>
                <th>Category</th>
                <th>Posteos Links</th>
                <th>Comment Links</th>
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
                  <td<a href="{{route('admin.posts.edit', $post->slug)}}">>{{$post->title}}</a></td>
                  <td>{{$post->user->name}}</td>
                  <td>{{$post->category ? $post->category->name : "Sin categoría"}}</td>
                  <td><a href="{{route('home.post', $post->slug)}}">Ver Posteo</a></td>
                  <td><a href="{{route('admin.comments.show', $post->id)}}">Ver Comments</a></td>

                  <td>{{$post->created_at->diffForHumans()}}</td>
                  <td>{{$post->updated_at}}</td>
              </tr>
          @endforeach
        @endif

        </tbody>
    </table>


    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>

@stop