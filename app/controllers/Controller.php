<?php

namespace App\Controllers;

class Controller
{
    public function view($route, $data = [])
    {
        extract($data);

        $route = str_replace('.', '/', $route);

        // Ruta absoluta REAL a app/resource/views/
        $basePath = dirname(__DIR__) . "/resource/views/{$route}.php";

        if (file_exists($basePath)) 
        {
            ob_start();
            include $basePath;
            return ob_get_clean();
        } else 
        {
            return "La vista '{$route}' no existe en: {$basePath}";
        }
    }
}
