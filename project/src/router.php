<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/players' => 'controllers/players/index.php',
    '/teams' => 'controllers/teams/index.php',
    '/teams/create' => 'controllers/teams/create.php'
];

function control($uri, $routes){
    if(array_key_exists($uri, $routes)){
        require $routes[$uri];
    } else {
        abort(404);
    }
}

function abort(int $int = Response::NOTFOUND){
    require "views/errors/{$int}.php";
    exit();
}

control($uri, $routes);