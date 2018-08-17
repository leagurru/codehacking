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

@if(Auth::check())

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
@endif


<hr>

<!-- Posted Comments -->


@if( count( $comments) > 0 )

    <!-- Comment -->
    @foreach($comments as $comment)
        <div class="media">
            <a class="pull-left" href="#">
                <img height="64" class="media-object" src="{{$comment->photo ? $comment->photo : 'http://placehold.it/64x64'}}" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{$comment->author}}
                    <small>{{$comment->created_at->diffForHumans()}}</small>
                </h4>
                <p>{{$comment->body}}</p>


                @if(count($comment->replies) > 0 )
                    @foreach($comment->replies as $reply)

                            <!-- Nested Comment -->
                            <div id="nested-comment" class="media">
                                <a class="pull-left" href="#">
                                    <img height="64" class="media-object" src="{{$reply->photo}}" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$reply->author}}
                                        <small>{{$reply->created_at ? $reply->created_at->diffForHumans(): 'Sin fecha'}}</small>
                                    </h4>
                                    <p>{{$reply->body}}</p>
                                </div>

                                <div class="comment-reply-container">

                                    <button class="toggle-reply btn btn-primary pull-right">Responder</button>

                                    <div class="comment-reply col-sm-6">


                                        {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply'])  !!}
                                            {{csrf_field()}}

                                            <div class="form-group">

                                                <input type="hidden" name="comment_id" value="{{$comment->id}}">

                                            {!! Form::label('body','Body:') !!}
                                            {!! Form::textarea('body',null,['class'=>'form-control ','rows'=>1]) !!}
                                            </div>

                                            <div class="form-group">
                                            {!! Form::submit('submit',['class'=>'btn btn-primary']) !!}
                                            </div>

                                        {!! Form::close() !!}
                                    </div>


                            </div>
                        <!-- End Nested Comment -->
                    </div>
                    @endforeach
                @endif

            </div>
        </div>
    @endforeach
@endif


@stop


@section('scripts')
<script>
    $(".comment-reply-container .toggle-reply").click(function(){
        $(this).next().slideToggle("slow");
    });
</script>
@stop
