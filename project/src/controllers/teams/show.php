<?php

use Core\App;
use Core\Database;

$name = $_GET['name'];

$db = App::resolve(Database::class);

$team = $db -> query ("select * from teams where name = ?", [$name]) -> findOrAbort();

$currentUserId = 1;
$heading = $team['name'];

views('teams/show.view.php',[
    'heading' => $heading,
    'team' => $team
]);