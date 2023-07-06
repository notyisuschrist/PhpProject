<?php

function uriValue(string $uri){
    return $_SERVER['REQUEST_URI'] === $uri;
}

function authorize($condition){
    if(!$condition){
        abort(Response::FORBIDDEN);
    }
}

function basePath(string $route): string {
    return BASE_PATH . $route;
}

function views(string $route, $args = []): void {
    extract($args);
    require basePath('views/' . $route);
}