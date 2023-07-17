<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$teams = $db -> query("select * from teams", []) ->statement ->fetchAll();

views('teams/index.view.php', [
    'heading' => 'Teams',
    'teams' => $teams
]);