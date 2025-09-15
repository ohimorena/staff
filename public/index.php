<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';
require_once dirname(__DIR__) . '/config/path.php';
require_once CORE . '/funcs.php';
require_once CONFIG . '/routes.php';


$uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');

if (array_key_exists($uri, $routes)) {
    $routes[$uri]();
} else {
    echo '404 Not Found';
}
