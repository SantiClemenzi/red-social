<?php

use Illuminate\Support\Arr;
// use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;


// GET: Obtiene los datos
// POST: Guarda los datos
// PUT: Actualiza recursos
// DELETE: Elimina recursos

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pelicula/{pagina?}', [PeliculaController::class, 'index']);
Route::get('/detalle/{year?}', [PeliculaController::class, 'detalle'])->middleware('yearcomprove');
Route::get('/form', [PeliculaController::class, 'form']);
Route::post('/recibir', [PeliculaController::class, 'recibir']);

// Route::resource('usuario', ['uses' => UsuarioController::class, 'index', 'as' => 'index.usuario']);

/*
Route::get('/fecha', function () {
    return view('fecha');
});

// pasar parametros url
Route::get('/pelicula/{titulo?}', function ($titulo = 'No se encontraron peliculas') {
    return view('peliculas.pelicula', array(
        'titulo'=>$titulo,
    ));
    // creamos condicion
})->where(array(
    'titulo' => '[a-zA-Z]+',
));

Route::get('/listado', function () {
    $titulo = 'Listado de peliculas';

    return view('peliculas.listado', array(
        'titulo' => $titulo,
    ));
});
*/