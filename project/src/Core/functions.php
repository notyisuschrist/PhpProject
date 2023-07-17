<?php

use Core\Response;

function uriValue(string $uri){
    return $_SERVER['REQUEST_URI'] === $uri;
}

function authorize($condition): void
{
    if(!$condition){
        abort(Response::FORBIDDEN);
    }
}

function basePath(string $route): string {
    return BASE_PATH . $route;
}

function abort($code = 404)
{
    http_response_code($code);

    require basePath("views/errors/{$code}.php");

    die();
}

function views(string $route, $args = []): void {
    extract($args);
    require basePath('views/' . $route);
}