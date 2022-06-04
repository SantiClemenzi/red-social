<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class commentController extends Controller
{
        // añadimos las restricciones
        public function __construct()
        {
            $this->middleware('auth');
        }
        public function store(Request $request)
        {
            $validate = $this->validate($request, [
                'image_id' => 'integer|required',
                'comment' => 'string|required',
            ]);

            $image_id = $request->input('image_id');
            $comment = $request->input('comment');
            var_dump($image_id);
            var_dump($comment);
        }
}
