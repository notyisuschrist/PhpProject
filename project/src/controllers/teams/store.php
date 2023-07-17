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
    return view("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}

$db -> query("INSERT INTO teams(name, win, lose) VALUES(:name, :win, :lose)", [
    'name' => strtoupper($_POST['name']),
    'win' => $_POST['win'],
    'lose' => $_POST['lose']
]) ->statement ->fetchAll();

header('location: /teams');
die();