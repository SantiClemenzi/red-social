<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    // añadimos las restricciones
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function like($image_id)
    {
        // recogemos los datos usuario y like
        $user = Auth::user();

        // condicion para no repetir el like
        $isset_like = Like::where('user_id', $user->id)
            ->where('image_id', $image_id)
            ->count();

        if ($isset_like == 0) {
            $like = new Like();
            $like->user_id = $user->id;
            $like->image_id = (int)$image_id;

            // guardamos los datos
            $like->save();


            return response()->json([
                'like' => $like
            ]);
        } else {
            return response()->json([
                'message' => 'El like ya existe!!'
            ]);
        }
    }

    public function dislike($image_id)
    {
        // recogemos los datos usuario y like
        $user = Auth::user();

        // condicion para no repetir el dislike
        $isset_like = Like::where('user_id', $user->id)
            ->where('image_id', $image_id)
            ->first();

        if ($isset_like) {

            $isset_like->delete();

            return response()->json([
                'like' => $isset_like,
                'message' => 'Haz dado dislike correctamente!!',
            ]);
        } else {
            return response()->json([
                'message' => 'El Dislike ya existe!!'
            ]);
        }
    }

    public function likes()
    {
        $likes = Like::orderBy('image_id', 'desc')->paginate(5);

        return view('like.likes', [
            'likes' => $likes,
        ]);
    }
}
