@extends('layouts.admin')
@section('content')
    @if(Session::has('deleted_foto'))
        <p class="bg-danger">{{session('deleted_foto')}}</p>
    @endif


    <h1>Media</h1>

    @if($photos)

        <form action="delete/media" method="post" class="form-inline">

            {{csrf_field()}}
            {{method_field('delete')}}

            <div class="form-group">
                <select name="checkBoxArray" class="form-control">
                    <option value="">Borrar</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="delete_all" class="btn-primary">
            </div>



        
                <table class="table">
                    <thead>
                    <tr>
                        <th><input type="checkbox" id="options"></th>
                        <th>Id</th>
                        <th>Archivo</th>
                        <th>Creado</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($photos as $photo)
                            <tr>
                                <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                                <td>{{$photo->id}}</td>
                                <td><img height="50" src="{{$photo->file}}" alt=""></td>
                                <td>{{$photo->created_at ? $photo->created_at : 'Sin fecha'}}</td>

                                <td>
                                        <input type="hidden" name="photo" value="{{$photo->id}}">

                                        <div class="form-group">
                                            <input type="submit" name="delete_single" value="Borrar" class="btn btn-danger">
                                        </div>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>

                </table>

        </form>

    @endif

@stop

@section('scripts')
    <script>
        $(document).ready(function(){

            $('#options').click(function(){
               if(this.checked){
                   $('.checkBoxes').each(function(){
                        this.checked = true;
                   });
               }else{
                       $('.checkBoxes').each(function(){
                           this.checked = false;
                       });
               }
            });
        });

    </script>
@stop