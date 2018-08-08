@extends('layouts.admin')
@section('content')
    <h1>Editar Posteo</h1>

    <div class="row">
        {!! Form::model($post,['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id],'files'=>true])  !!}
        {{csrf_field()}}

        <div class="form-group">

            {!! Form::label('title','Título:') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category_id','Categoría:') !!}
            {{--{!! Form::select('category_id',array(1=>'PHP',2=>'Javascrip'),null,['class'=>'form-control']) !!}--}}
            {!! Form::select('category_id', $categories ,null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id','Foto:') !!}
            {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('body','Texto:') !!}
            {!! Form::textarea('body',null,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Actualizar Post',['class'=>'btn btn-primary col-sm-6']) !!}
        </div>


        {!! Form::close() !!}


        {!! Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id]])  !!}
            <div class="form-group">
                {!! Form::submit('Borrar Post',['class'=>'btn btn-danger col-sm-6']) !!}
            </div>

        {!! Form::close() !!}

    </div>

    <div class="row">
        @include('includes.form_error')
    </div>
@stop