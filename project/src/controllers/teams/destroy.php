<?php

use Core\App;
use Core\Database;


$db = App::resolve(Database::class);

$currentUserId = 1;

$team = $db->query('select * from teams where id = :id', [
    'id' => $_POST['id']
])->findOrAbort();

//authorize($note['user_id'] === $currentUserId);

$db->query('delete from teams where id = :id', [
    'id' => $_POST['id']
]);

header('location: /teams');
exit();