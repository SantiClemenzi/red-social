<?php
class Persona
{
    private $nombre;
    private $edad;
    private $ciudad;

    public function __construct($nombre, $edad, $ciudad)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->ciudad = $ciudad;
    }

    public function __call($name, $arguments)
    {
        $prefix_method = substr($name, 0, 3);
        if ($prefix_method == 'get') {

            $method_name = substr(strtolower($name), 3);

            if (!isset($this->$method_name)) {
                return 'El metodo NO existe';
            }

            return $this->$method_name;
        } else {
            return 'El metodo NO existe';
        }

        return 'No existe el metodo';
    }
}

$persona = new Persona('Santiago Clemenzi', 21, 'Cordoba');

echo $persona->getNombre();
echo '</br>';
echo $persona->getEdad();
echo '</br>';
echo $persona->getCiudad();
echo '</br>';
echo $persona->getAuto();

