@extends('layouts.admin')
@section('content')

    @include('includes.tinyeditor')

    <h1>Crear Posteo</h1>

    <div class="row">
        {!! Form::open(['method'=>'POST','action'=>'AdminPostsController@store','files'=>true])  !!}
        {{csrf_field()}}

        <div class="form-group">

            {!! Form::label('title','Título:') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category_id','Categoría:') !!}
            {{--{!! Form::select('category_id',array(1=>'PHP',2=>'Javascrip'),null,['class'=>'form-control']) !!}--}}
            {!! Form::select('category_id',['' => 'Elegir Categoría'] + $categories ,null,['class'=>'form-control']) !!}
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
            {!! Form::submit('Crear Post',['class'=>'btn btn-primary']) !!}
        </div>


        {!! Form::close() !!}

    </div>

    <div class="row">
        @include('includes.form_error')
    </div>
@stop