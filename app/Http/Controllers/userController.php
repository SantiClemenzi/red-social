<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class userController extends Controller
{
    // añadimos las restricciones
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($search = null)
    {
        if (!empty($search)) {
            $user = User::where('username', 'LIKE', '%' . $search . '%')->orWhere('name', 'LIKE', '%' . $search . '%')->orderBy('id', 'desc')->paginate(5);
        } else {
            $user = User::orderBy('id', 'desc')->paginate(5);
        }
        return view('user.index', [
            'users' => $user,
        ]);
    }

    public function config()
    {
        return view('user.config');
    }
    // metodo update
    public function upDate(Request $request)
    {
        // seteamos el usuario
        $user = Auth::user();
        $id = $user->id;

        // validamos los datos ingresados
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'username' => ['required', 'string', 'max:255', Rule::unique('users', 'username')->ignore($id, 'id')],
            'email' => ['required', 'string', 'max:255', Rule::unique('users', 'email')->ignore($id, 'id')],
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

        // subir imagen
        $image_path = $request->file('image_path');

        if ($image_path) {
            // establecemos la ruta
            $image_path_name = time() . $image_path->getClientOriginalName();

            // guardamos en la carpeta del storage 
            Storage::disk('users')->put($image_path_name, File::get($image_path));
            // guardamos en la db
            $user->image = $image_path_name;
        }

        // ejecutamos la consulta
        $user->update();

        return redirect()->route('config')
            ->with(['message' => 'Usuario actualizado correctamente']);
    }

    public function getImage($filename)
    {
        $file = Storage::disk('users')->get($filename);

        return  Response($file, 200);
    }

    public function profile($id)
    {
        $user = Auth::user();

        return view('user.profile', [
            'user' => $user,
        ]);
    }
}
