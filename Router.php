<?php

namespace MVC;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];

    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }

    public function comprobarRutas()
    {

        // $url_actual = $_SERVER['PATH_INFO'] ?? '/';
        // Tokenizamos la URL:
        $url_actual = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';
        // Eliminar slash final para un matching consistente, excepto en la raíz
        if ($url_actual !== '/' && strlen($url_actual) > 1) {
            $url_actual = rtrim($url_actual, '/');
        }
        
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            $fn = $this->getRoutes[$url_actual] ?? null;
        } else {
            $fn = $this->postRoutes[$url_actual] ?? null;
        }

        if ($fn) {
            call_user_func($fn, $this);
        } else {
            header('Location: /404');
        }
    }

    public function render($view, $datos = [])
    {
        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        ob_start();

        include_once __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean(); // Limpia el Buffer

        // Utilizar el Layout de acuerdo a la url
        // Usar REQUEST_URI para compatibilidad con Nginx y eliminar query string
        $url_actual = strtok($_SERVER['REQUEST_URI'] ?? '/', '?');
        if (str_contains($url_actual, '/admin')) {
            include_once __DIR__ . '/views/admin-layout.php';
        } else {
            include_once __DIR__ . '/views/layout.php';
        }
    }
}
