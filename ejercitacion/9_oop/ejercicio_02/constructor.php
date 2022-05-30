<?php
// definimos la clase
class Auto
{
    // definimos atributos
    public $marca;
    public $modelo;
    public $velocidad;
    public $color;

    public function __construct($marca, $modelo, $velocidad, $color)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->velocidad = $velocidad;
        $this->color = $color;
    }

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
    public function getInfo($objeto){
        if(is_object($objeto)){
            $informacion = '<h1>Informacion del Auto</h1>';
            $informacion .= '</br>Modelo: '. $objeto->modelo;
            $informacion .= '</br>Marca: '. $objeto->marca;
            $informacion .= '</br>Velocidad: '. $objeto->velocidad;
            $informacion .= '</br>Color: '. $objeto->color;
        }else{
            $informacion = 'El parametro pasado no es un objeto';
        }

        return $informacion;
    }
}

