<?php

spl_autoload_register(function($clase) 
{
    // Ruta absoluta al raíz del proyecto
    $base = __DIR__;

    // Convertir namespace → ruta
    $ruta = $base . '/' . str_replace('\\', '/', $clase) . '.php';

    if (file_exists($ruta)) 
    {
        require_once $ruta;
    } else 
    {
        die("ERROR: No se pudo cargar la clase $clase desde $ruta");
    }
});
