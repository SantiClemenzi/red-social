<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class commentController extends Controller
{
    // añadimos las restricciones
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $user = Auth::user();

        // realizamos la validacion
        $validate = $this->validate($request, [
            'image_id' => 'integer|required',
            'comment' => 'string|required',
        ]);

        // obtenemos los datos del form
        $image_id = $request->input('image_id');
        $comment1 = $request->input('comment');

        // seteamos los nuevos valores
        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->image_id = $image_id;
        $comment->content = $comment1;

        // guardamos los datos
        $comment->save();

        // redireccion
        return redirect()->route('image.detail', ['id' => $image_id])
                         ->with(['message' => 'Tu comentario ha sido añadido exitosamente!!']);
    }

    public function delete($id)
    {
        // obtenemos el usuario
        $user = Auth::user();

        // obtenemos objeto del commentario
        $comment = Comment::find($id);

        // comprobamos que el usuario coincida con el comentario a borrar
        if($user && ($comment->user_id == $user->id || $comment->image->user_id == $user->id))
        {
            $comment->delete();

            // redireccion
            return redirect()->route('image.detail', ['id' => $comment->image->id])
                             ->with(['message' => 'Tu comentario ha sido eliminado']);
        }  else
        {
            // redireccion
            return redirect()->route('image.detail', ['id' => $comment->image->id])
                             ->with(['message' => 'Error, no pudimos eliminar tu mensaje']);
        }


    }
}
