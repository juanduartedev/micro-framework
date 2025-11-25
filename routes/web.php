<?php

use Lib\Route;

use App\controllers\HomeController;

//Aquí se crean las rutas para poder llamar a los métodos de la clase HomeController

//El unico método existente de momento dentro del Framework de momento es el GET

Route::get('/', [HomeController::class, 'home']);

Route::dispatch();