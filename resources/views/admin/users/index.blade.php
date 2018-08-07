@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_user'))
        <p class="bg-danger">{{session('deleted_user')}}</p>
    @endif
    @if(Session::has('updated_user'))
        <p class="bg-danger">{{session('updated_user')}}</p>
    @endif
    @if(Session::has('created_user'))
        <p class="bg-danger">{{session('created_user')}}</p>
    @endif


    <h1>Usuarios</h1>

    <table class="table">
        <thead>
          <tr>
              <th>Id</th>
              <th>Foto</th>
              <th>Nombre</th>
              <th>Email</th>
              <th>Rol</th>
              <th>Status</th>
              <th>Creado</th>
              <th>Actualizado</th>
          </tr>
        </thead>
        <tbody>

        @if($users)
            @foreach($users as $user)

                <tr>
                    <td>{{$user->id}}</td>
                    {{--<td>{{$user->photo ? $user->photo->file : 'Sin foto'}}</td>--}}
                    <td><img height="50" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
                    {{--<td>{{$user->name}}</td>--}}

                    <td><a href="{{route('admin.users.edit',$user->id)}}">{{$user->name}}</a></td>


                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->is_active == 1 ? 'Activo' : 'Desactivado'}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                </tr>

            @endforeach
        @endif

        </tbody>
    </table>

@stop
