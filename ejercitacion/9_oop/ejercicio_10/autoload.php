<?php

function autoload_classes($class)
{
    require_once 'classes/' . $class . '.php';
}

spl_autoload_register('autoload_classes');
