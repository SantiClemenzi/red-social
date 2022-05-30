<?php
// definimos la clase
class Auto
{
    // definimos atributos
    public $marca = 'VW';
    public $modelo = 'GOL';
    public $velocidad = 130;
    public $color = 'GRIS';

    // metodos son acciones del objeto
    public function getColor()
    {
        return $this->color;
    }
    public function setColor($color)
    {
        $this->color = $color;
    }
    public function acelerar()
    {
        $this->velocidad++;
    }
    public function frenar()
    {
        $this->velocidad--;
    }
    public function getVelocidad()
    {
        return $this->velocidad;
    }
}

// creamos la clase
$auto = new Auto();

// usamos los metodos

echo $auto->getVelocidad();
// aumentamos la velocidad
$auto->acelerar();
$auto->acelerar();
$auto->acelerar();
echo '</br>';
echo $auto->getVelocidad();
$auto->frenar();
echo '</br>';
echo $auto->getVelocidad();
