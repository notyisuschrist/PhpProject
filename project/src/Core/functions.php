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

function views(string $route, $args = []){
    extract($args);
    require basePath('views/' . $route);
}

function login($email, $userId){
    $_SESSION['user'] = [
        'email' => $email,
        'id' => $userId,
        'logged_in' => true
    ];
}

function logout(){
    $_SESSION = [];
    session_destroy();

    $param = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 300, $param['path'], $param['domain'], $param['secure'],$param['httponly']);
}