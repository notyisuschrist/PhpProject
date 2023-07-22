<?php

use Core\App;
use Core\Database;

$name = $_GET['name'];
$currentUserId = $_SESSION['user']['id'];

$db = App::resolve(Database::class);

$team = $db -> query ("select * from teams where name = :name", [
    'name' => $name
]) -> findOrAbort();

authorize($condition = ($currentUserId === $team['user_id']));

views('teams/show.view.php',[
    'heading' => $team['name'],
    'team' => $team
]);