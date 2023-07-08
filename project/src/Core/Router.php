<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

//$routes = basePath('routes.php');

$routes = [
    '/' => 'controllers/index.php',
    '/teams' => 'controllers/teams.php',
    '/players' => 'controllers/players.php'
];

function control($uri, $routes){
    if(array_key_exists($uri, $routes)){
        require $routes[$uri];
    } else {
        abort(404);
    }
}

function abort(int $int = 404){
    require "views/errors/{$int}.php";
    exit();
}

control($uri, $routes);