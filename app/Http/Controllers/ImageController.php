<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class ImageController extends Controller
{
    //añadimos las restricciones
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('image.create');
    }
    public function save(Request $request)
    {
        // validacion
        $validate = $this->validate($request, [
            'description' => 'required',
            'image_path' => 'required|image',
        ]);

        // obtenemos los datos
        $image_path = $request->file('image_path');
        $description = $request->input('description');

        // asignamos los valores
        $user = Auth::user();
        $image = new Image();
        $image->user_id = $user->id;
        // $image->image_path = null;
        $image->description = $description;

        // subimos imagen
        if ($image_path) {
            // establecemos la ruta
            $image_path_name = time() . $image_path->getClientOriginalName();

            // guardamos en la carpeta del storage 
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            // guardamos en la db
            $image->image_path = $image_path_name;
        }

        $image->save();
        return redirect()->route('home')->with([
            'message' => 'La foto se ha sido subida correctamente',
        ]);
    }

    public function getImage($filename)
    {
        $file = Storage::disk('images')->get($filename);

        return  Response($file, 200);
    }

    public function detail($id)
    {
        $image = Image::find($id);

        return view('image.detail', [
            'image' => $image,
        ]);
    }

    public function delete($id)
    {
        $user = Auth::user();
        $image = Image::find($id);
        $comments = Comment::where('image_id', $id)->get();
        $likes = Like::where('image_id', $id)->get();

        if ($user && $image->user->id == $user->id) {
            // eliminamos comentarios
            if ($comments && count($comments) >= 1) {
                foreach ($comments as $comment) {
                    $comment->delete();
                }
            }

            // eliminar likes
            if ($likes && count($likes) >= 1) {
                foreach ($likes as $like) {
                    $like->delete();
                }
            }

            // eliminamos ficheros de imagen
            Storage::disk('images')->delete($image->image_path);

            // eliminamos registro de images
            $image->delete();

            $message = array('message' => 'La imagen se borro correctamente');
        } else {
            $message = array('message' => 'Error al eliminar la imagen');
        }
        // return $message;
        return redirect()->route('home')->with($message);
    }

    public function edit($id)
    {
        $user = Auth::user();
        $image = Image::find($id);

        if ($user && $image->user->id == $user->id) {
            return view('image.edit', [
                'image' => $image,
            ]);
        } else {
            return redirect()->route('home');
        }
    }
}
