<?php

abstract class Pc
{
    public $encendido;

    abstract public function encender();

    public function apagar()
    {
        $this->encendido = false;
    }
}

class PcLenovo extends Pc
{
    public $software;

    public function iniciarSoftware()
    {
        $this->software = true;
    }
    public function encender()
    {
        $this->encendido = true;
    }
    public function apagar()
    {
        $this->encendido = false;
    }
}

$ordenador = new PcLenovo();
$ordenador->iniciarSoftware();
$ordenador->encender();
var_dump($ordenador);
$ordenador->apagar();
var_dump($ordenador);