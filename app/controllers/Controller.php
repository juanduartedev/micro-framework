<?php

namespace App\Controllers;

class Controller
{
     public function view($route, $data = [])
    {

        extract($data);

        $route = str_replace('.', '/', $route);
    
        if(file_exists("../app/resource/views/{$route}.php"))
            {

                ob_start();
                include "../app/resource/views/{$route}.php";
                $content = ob_get_clean();

                return $content;

            }else
            {
                return 'El archivo no existe';
            }
    }
}