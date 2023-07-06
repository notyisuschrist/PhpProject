<?php

function basePath($route): string{
    return BASE_PATH . $route;
}

function views($path, $attributes = []): void {
    extract($attributes);

    require basePath('views/' . $path);
}

function controllers($route): string {
    return basePath('controllers/' . $route);
}

function urlValue($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}