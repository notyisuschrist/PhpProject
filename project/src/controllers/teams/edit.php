<?php
use Core\App;
use Core\Database;

$name = $_GET['name'];
$currentUserId = $_SESSION['user']['id'];

$db = App::resolve(Database::class);

$team = $db -> query ("select * from teams where name = ?", [$name]) -> findOrAbort();
authorize($condition = ($currentUserId === $team['user_id']));


$heading = $team['name'];

views('teams/edit.view.php',[
    'heading' => $heading,
    'team' => $team
]);