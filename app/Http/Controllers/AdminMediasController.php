<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminMediasController extends Controller
{
    public function index(){

        $photos = Photo::all();
        return view('admin.media.index',compact('photos'));
    }

    public function create(){

        return view('admin.media.create');
    }

    public function store(Request $request){

        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();
        $file->move('images', $name);
        Photo::create( ['file'=>$name ]);

    }

    public function destroy($id){
        $photo = Photo::findOrFail($id);
        unlink( public_path() . $photo->file );
        $foto_nombre = $photo->file ;
        $photo->delete();
        Session::flash('deleted_foto','Se ha borrado la foto: ' . $foto_nombre );
//        return redirect('/admin/media');
    }


    public function deleteMedia(Request $request){

//        if(isset($request->delete_single)){
//
//            $this->destroy($request->photo);
//            return redirect()->back();
//
//        }

        if(isset($request->delete_all) && !empty($request->checkBoxArray) ){

            $photos = Photo::findOrfail($request->checkBoxArray);
            foreach ($photos as $photo){
                $photo->delete();
            }

            return redirect()->back();


        } else {

            return redirect()->back();
        }


    }
}
