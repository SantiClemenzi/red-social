<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    public function index($pagina = 1)
    {
        $titulo = 'Mis Peliculas Favoritas';
        return view('pelicula.index', [
            'titulo' => $titulo,
            'pagina' => $pagina,
        ]);
    }

    public function detalle($year = null)
    {
       return view('pelicula.detalle');
    }
   
    public function form()
    {
       return view('pelicula.form');
    }
    
    public function recibir(Request $request)
    {
        $nombre = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        var_dump($_POST);
        die();
    }
}
