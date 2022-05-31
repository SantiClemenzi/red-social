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
        $id = Auth::user()->id;

        $validate = $this->validate($request,[
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'username' => ['required', 'string', 'max:255', Rule::unique('users','username')->ignore($id, 'id')],
            'email' => ['required', 'string', 'max:255', Rule::unique('users','email')->ignore($id, 'id')],
        ]);

        $name = $request->input('name');
        $surname = $request->input('surname');
        $username = $request->input('username');
        $email = $request->input('email');
        var_dump($id);
        var_dump($name);
        var_dump($surname);
        var_dump($username);
        var_dump($email);
        die();
    }
}
