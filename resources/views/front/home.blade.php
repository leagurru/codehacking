@extends('layouts.blog-home')

@section('content')
    <div class="container">
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8" >

                <!-- First Blog Post -->
                @if($posts)
                    @foreach($posts as $post)

                        <h2 style="margin-top:80px;">
                            <a href="#">{{$post->title}}</a>
                        </h2>
                        <p class="lead">
                            por {{$post->user->name}}
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> Enviado {{$post->created_at->diffForHumans()}}</p>
                        <hr>
                        <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                        <hr>
                        {{--<p>{{str_limit($post->body,100)}}</p>--}}
                        <p>{!!str_limit($post->body,100)!!}</p>
                        <a class="btn btn-primary" href="/post/{{$post->slug}}">Leer Más <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>
                    @endforeach
                @endif


                <!-- Paginacion -->


            </div>

            <!-- Blog Sidebar Widgets Column -->
            @include('includes.front_sidebar')


        </div>
        <!-- /.row -->
    </div>
@endsection
