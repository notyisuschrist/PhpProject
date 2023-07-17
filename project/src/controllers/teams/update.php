<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$errors = [];

if(!Validator::inputString($_POST['name'], 1, 20))
    $errors['name'] = 'A body of max. 20 characters is requiered';

if(!empty($errors)){
    return view('teams/create.view.php',[
        'errors' => $errors,
        'heading' => 'New team'
    ]);
}

$db-> query("update teams set name = :name, win = :win, lose = :lose where id = :id", [
    'name' => $_POST['name'],
    'win' => $_POST['win'],
    'lose' => $_POST['lose'],
    'id' => $_POST['id']
]);

header('location: /teams');
die();