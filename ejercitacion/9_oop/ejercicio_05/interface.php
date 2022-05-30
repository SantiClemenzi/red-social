<?php
interface Ordenador
{
    public function encender();
    public function reiniciar();
    public function apagar();
}

class Imac implements Ordenador
{
    public $modelo;
    public function getModelo()
    {
        return $this->modelo;
    }
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }
    public function encender()
    {
        return 'Pc encendida';
    }
    public function reiniciar()
    {
        return 'Pc reiniciando';
    }
    public function apagar()
    {
        return 'Pc apagada';
    }
}

$apple = new Imac();
$apple->setModelo('MACBOOK PRO MAX');

echo $apple->getModelo();
echo '</br>';
echo $apple->encender();
