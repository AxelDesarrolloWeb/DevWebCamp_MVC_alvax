<?php 

use Dotenv\Dotenv;
use Model\ActiveRecord;
require __DIR__ . '/../vendor/autoload.php';

// Añadir Dotenv
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

// Normalizar variables de entorno para producción (DOMCloud)
// Mapear MAIL_* -> EMAIL_*
if (empty($_ENV['EMAIL_HOST']) && !empty($_ENV['MAIL_HOST'])) {
    $_ENV['EMAIL_HOST'] = $_ENV['MAIL_HOST'];
}
if (empty($_ENV['EMAIL_USER']) && !empty($_ENV['MAIL_USER'])) {
    $_ENV['EMAIL_USER'] = $_ENV['MAIL_USER'];
}
if (empty($_ENV['EMAIL_PASS']) && !empty($_ENV['MAIL_PASSWORD'])) {
    $_ENV['EMAIL_PASS'] = $_ENV['MAIL_PASSWORD'];
}
if (empty($_ENV['EMAIL_PORT']) && !empty($_ENV['MAIL_PORT'])) {
    $_ENV['EMAIL_PORT'] = $_ENV['MAIL_PORT'];
}

// Definir HOST a partir de SERVER_HOST o HTTP_HOST si no está establecido
if (empty($_ENV['HOST'])) {
    if (!empty($_ENV['SERVER_HOST'])) {
        $_ENV['HOST'] = $_ENV['SERVER_HOST'];
    } elseif (!empty($_SERVER['HTTP_HOST'])) {
        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https://' : 'http://';
        $_ENV['HOST'] = $scheme . $_SERVER['HTTP_HOST'];
    }
}

require 'funciones.php';
require 'database.php';

// Conectarnos a la base de datos
ActiveRecord::setDB($db);