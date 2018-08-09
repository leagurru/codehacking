@extends('layouts.admin')
@section('content')

    <h1>Editar Categoría</h1>

    <div class="col-sm-6">
        {!! Form::model($category,['method'=>'PATCH','action'=>['AdminCategoriesController@update',$category->id]])  !!}

        <div class="form-group">
            {!! Form::label('name','Nombre:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Actualizar Categoría',['class'=>'btn btn-primary col-sm-6']) !!}
        </div>

        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id]])  !!}


        <div class="form-group">
            {!! Form::submit('Borrar Categoría',['class'=>'btn btn-danger col-sm-6']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@stop