@extends('layouts.admin')
@section('content')

    <h1>Media</h1>

    @if($photos)

        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Archivo</th>
                <th>Creado</th>
            </tr>
            </thead>

            <tbody>
            @foreach($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td><img height="50" src="{{$photo->file}}" alt=""></td>
                    <td>{{$photo->created_at ? $photo->created_at : 'Sin fecha'}}</td>
                </tr>

            @endforeach
            </tbody>

        </table>

    @endif
@stop