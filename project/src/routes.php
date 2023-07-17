<?php

$router -> get('/', 'controllers/index.php');
$router -> get('/players', 'controllers/players/index.php');

$router -> get('/teams', 'controllers/teams/index.php');
$router -> get('/team', 'controllers/teams/show.php');

$router -> patch('/team', 'controllers/teams/update.php');
$router -> get('/team/edit', 'controllers/teams/edit.php');

$router -> delete('/team', 'controllers/teams/destroy.php');
$router -> get('/teams/create', 'controllers/teams/create.php');
$router -> post('/teams', 'controllers/teams/store.php');

