<?php
// creamos trait
trait Utilidades
{
    public function mostrarNombre()
    {
        return '<h1>El nombre es ' . $this->nombre . '</h1>';
    }
}
// creamos clases
class Auto
{
    public $modelo;
    public $marca;

    // aplicamos el trait
    use Utilidades;
}
class Persona
{
    public $nombre;
    public $apellido;

    // aplicamos el trait
    use Utilidades;
}
class Juego
{
    public $nombre;
    public $year;

    // aplicamos el trait
    use Utilidades;
}


$auto = new Auto();
$auto -> nombre = 'VW GOL';
echo $auto->mostrarNombre();

echo '</br>';

$persona = new Persona();
$persona -> nombre = 'Juan Perez';
echo $persona->mostrarNombre();

echo '</br>';

$juego = new Juego();
$juego -> nombre = 'GTA San Andreas';
echo $juego->mostrarNombre();