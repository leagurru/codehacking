@extends('layouts.admin')
@section('content')

    @if($comment)

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

                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->body}}</td>
                    <td><a href="{{route('home.post', $comment->post->id)}}">Ver Post</a></td>

                    <td>
                        @if($comment->is_active == 1)

                            {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update', $comment->id]])  !!}
                            {{--{{csrf_field()}}--}}

                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('Desaprobar',['class'=>'btn btn-success']) !!}
                            </div>

                            {!! Form::close() !!}
                        @else

                            {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update', $comment->id]])  !!}
                            {{--{{csrf_field()}}--}}

                            <input type="hidden" name="is_active" value="1">


                            <div class="form-group">
                                {!! Form::submit('Aprobar',['class'=>'btn btn-info']) !!}
                            </div>

                            {!! Form::close() !!}

                        @endif


                    </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy', $comment->id]])  !!}
                        {{--{{csrf_field()}}--}}

                        <div class="form-group">
                            {!! Form::submit('Borrar',['class'=>'btn btn-danger']) !!}
                        </div>

                        {!! Form::close() !!}
                    </td>
                </tr>


            </tbody>
        </table>

    @endif
    @else


        <h1 class="text-center">No hay comentarios</h1>





@stop