<?php

namespace App\Controllers;
use App\Controllers\Controller;

class HomeController extends Controller
{

    //Método para mostrar la vista Home al usuario
    public function home()
    {

        //Carga la vista desde la carpeta app/resource/views
        return $this->view('home');
    }
}