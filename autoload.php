<?php

spl_autoload_register(function ($class) 
{
    $classPath = str_replace('\\', '/', $class);

    $file = __DIR__ . '/' . $classPath . '.php';

    if (file_exists($file)) 
    {
        require_once $file;
    } else 
    {
        echo "ERROR: No se pudo cargar la clase $class desde $file";
    }
});
