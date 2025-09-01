<?php 
    namespace Controllers;

use Model\EventoHorario;
use Model\Ponente;
use MVC\Router;

    class APIPonentes {
        public static function index(Router $router) {
            $ponentes = Ponente::all();

            echo json_encode($ponentes);
        }
    }
?>