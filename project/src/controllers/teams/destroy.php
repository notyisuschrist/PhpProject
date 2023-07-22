<?php

use Core\App;
use Core\Database;


$db = App::resolve(Database::class);

$currentUserId = $_SESSION['user']['id'];

$team = $db->query('select * from teams where id = :id', [
    'id' => $_POST['id']
])->findOrAbort();

authorize($team['user_id'] === $currentUserId);

$db->query('delete from teams where id = :id', [
    'id' => $_POST['id']
]);

header('location: /teams');
exit();