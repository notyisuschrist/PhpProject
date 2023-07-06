<?php

$config = require basePath('config.php');
$db = new Database($config['database'], 'user', 'pass');

$teams = $db -> query("select * from teams", []) ->statement ->fetchAll();

views('teams/index.view.php', [
    'heading' => 'Teams',
    'teams' => $teams
]);