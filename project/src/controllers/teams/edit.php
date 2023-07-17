<?php
use Core\App;
use Core\Database;

$name = $_GET['name'];

$db = App::resolve(Database::class);

$team = $db -> query ("select * from teams where name = ?", [$name]) -> findOrAbort();

$heading = $team['name'];

views('teams/edit.view.php',[
    'heading' => $heading,
    'team' => $team
]);