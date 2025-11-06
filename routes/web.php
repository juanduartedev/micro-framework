<?php

use Lib\Route;

use App\controllers\HomeController;

//Aquí se crean las rutas para poder llamar a los métodos de la clase HomeController

Route::get('/', [HomeController::class, 'home']);

Route::dispatch();