<?php
require_once 'static.php';

Config::setColor('Rojo');
Config::setNewsletter(true);
Config::setEntorno('LocalHost');

echo Config::getColor().'</br>';
echo Config::getNewsletter().'</br>';
echo Config::getEntorno().'</br>';