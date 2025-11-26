Esto es un framework basico de PHP con funcionalidades basicas y simples de utilizar por cualquier programador que tenga experiencia dentro del desarrollo.

Su Arquitectura se basa en el MVC (Modelo Vista Controlador)

Su logica va a estar en POO (Porgramación Orientada a Objetos)

El router de este framework se basa en el router de Laravel

Estructura del Framework

Este framework facilita el desarrollo de momento de sitios web aunque soporta los métodos POST Y GET, además tambien tiene las funcionalidades de PUT y DELETE.

Posee un Router solido para poder crear rutas sin problemas y poder tener un mejor SEO dentro de los buscadores, tambien un autoload.php para poder cargar las clases de manera automatica y no agregar documentos con require o require_once.

Muestra vistas desde los controladores y además puedes pasar variables como parametros de las vistas.

app
|
|_config
|   |_Config.php
|   |_Database.php
|
|_controllers
|   |_Controller.php
|   |_HomeController.php
|
|_models
|
|_resource
|    |_views
|        |_home.php
|_lib
|   |_Route.php
|
|public
|    |_css
|    |_img
|    |_js
|    |_.htaccess
|    |_index.php
|
|routes
|    |_web.php
|
|
|autoload.php