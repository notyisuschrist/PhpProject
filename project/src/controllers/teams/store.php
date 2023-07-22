<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

if (! Validator::inputString($_POST['name'], 1, 20)) {
    $errors['body'] = 'A name of no more than 20 characters is required.';
}

if (! empty($errors)) {
    views("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}

$db -> query("INSERT INTO teams(name, win, lose, user_id) VALUES(:name, :win, :lose, :user_id)", [
    'name' => strtoupper($_POST['name']),
    'win' => $_POST['win'],
    'lose' => $_POST['lose'],
    'user_id' => $_SESSION['user']['id']
]) ->statement ->fetchAll();

header('location: /teams');
die();