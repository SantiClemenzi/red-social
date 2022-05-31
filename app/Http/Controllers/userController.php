<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class userController extends Controller
{
    public function config()
    {
        return view('user.config');
    }
    // metodo update
    public function update(Request $request)
    {
        // seteamos el usuario
        $user = Auth::user();
        $id = $user->id;

        // validamos los datos ingresados
        $validate = $this->validate($request,[
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'username' => ['required', 'string', 'max:255', Rule::unique('users','username')->ignore($id, 'id')],
            'email' => ['required', 'string', 'max:255', Rule::unique('users','email')->ignore($id, 'id')],
        ]);

        // obtenemos los datos del form
        $name = $request->input('name');
        $surname = $request->input('surname');
        $username = $request->input('username');
        $email = $request->input('email');

        // asignamos los nuevos valores
        $user->name = $name;
        $user->surname = $surname;
        $user->username = $username;
        $user->email = $email;

        // ejecutamos la consulta
        $user->update();

        return redirect()->route('config')
                         ->with(['message'=>'Usuario actualizado correctamente']);

    }
}
