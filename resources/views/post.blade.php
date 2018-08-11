@extends('layouts.blog-post')

@section('content')

<!-- Blog Post -->

<!-- Title -->
<h1>...</h1>
<h1>{{$post->title}}</h1>

<!-- Author -->
<p class="lead">
    by <a href="#">{{$post->user->name}}</a>
</p>

<hr>

<!-- Date/Time -->
<p><span class="glyphicon glyphicon-time"></span> Posteado {{$post->created_at->diffForHumans()}}</p>

<hr>

<!-- Preview Image -->
{{--<img class="img-responsive" src="http://placehold.it/900x300" alt="">--}}
<img class="img-responsive" src="{{$post->photo->file}}" alt="">

<hr>

<!-- Post Content -->
{{--<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>--}}
<p>{{$post->body}}</p>

<hr>

@if(Session::has('comment_message'))
    {{session('comment_message')}}
@endif



<!-- Blog Comments -->

<!-- Comments Form -->
<div class="well">
    <h4>Escribir un Comentario:</h4>

        {!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store'])  !!}

    <input type="hidden" name="post_id" value="{{$post->id}}">
            
                     {{csrf_field()}}

                     <div class="form-group">

                         {!! Form::label('body','Cuerpo:') !!}
                         {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}
                     </div>

                     <div class="form-group">
                         {!! Form::submit('Enviar Comentario',['class'=>'btn btn-primary']) !!}
                     </div>

        {!! Form::close() !!}

    {{--<form role="form">--}}
        {{--<div class="form-group">--}}
            {{--<textarea class="form-control" rows="3"></textarea>--}}
        {{--</div>--}}
        {{--<button type="submit" class="btn btn-primary">Submit</button>--}}
    {{--</form>--}}
</div>

<hr>

<!-- Posted Comments -->

<!-- Comment -->
<div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="http://placehold.it/64x64" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">Start Bootstrap
            <small>August 25, 2014 at 9:30 PM</small>
        </h4>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
    </div>
</div>

<!-- Comment -->
<div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="http://placehold.it/64x64" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">Start Bootstrap
            <small>August 25, 2014 at 9:30 PM</small>
        </h4>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        <!-- Nested Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Nested Start Bootstrap
                    <small>August 25, 2014 at 9:30 PM</small>
                </h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>
        <!-- End Nested Comment -->
    </div>
</div>


@stop
