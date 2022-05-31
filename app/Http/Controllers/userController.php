<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
