<?php

$router -> get('/', 'controllers/index.php');
$router -> get('/players', 'controllers/players/index.php');

$router -> get('/teams', 'controllers/teams/index.php')->only('auth');
$router -> get('/team', 'controllers/teams/show.php')->only('auth');

$router -> patch('/team', 'controllers/teams/update.php');
$router -> get('/team/edit', 'controllers/teams/edit.php')->only('auth');

$router -> delete('/team', 'controllers/teams/destroy.php');
$router -> get('/teams/create', 'controllers/teams/create.php')->only('auth');
$router -> post('/teams', 'controllers/teams/store.php');

$router-> get('/register', 'controllers/register/create.php')->only('guest');
$router-> post('/register', 'controllers/register/store.php');

$router-> get('/login', 'controllers/login/create.php')->only('guest');
$router-> post('/login', 'controllers/login/store.php')->only('guest');
$router-> delete('/', 'controllers/login/destroy.php')->only('auth');
