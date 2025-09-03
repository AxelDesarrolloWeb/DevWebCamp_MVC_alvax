<?php

namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

class PaginasController
{
    public static function index(Router $router)
    {

        $alertas = [];
        $router->render('paginas/index', [
            'titulo' => 'Inicio'
        ]);
    }

    public static function evento(Router $router)
    {
        $router->render('paginas/debwebcamp', [
            'titulo' => 'Sobre WebDevCapm'
        ]);
    }

    public static function paquetes(Router $router)
    {
        $router->render('paginas/paquetes', [
            'titulo' => 'Paquetes WebDevCapm'
        ]);
    }

    public static function conferencias(Router $router)
    {
        $router->render('paginas/conferencias', [
            'titulo' => 'Conferencias & WorkShops'
        ]);
    }
}
