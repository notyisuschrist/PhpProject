<?php

$config = require basePath('config.php');
$db = new Database($config['database']);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $errors = [];

    if(strlen($_POST['name']) === 0 || strlen($_POST['name']) > 20) $errors['name'] = 'A name of max. 20 chars is required';

//    if(strlen($_POST['note']) === 0) $errors['note'] = 'A body of max. 1000 chars is required';
//    else if(strlen($_POST['note']) > 1000) $errors['note'] = 'Body max. chars is 1000';

    if(empty($errors)){
        $db -> query("INSERT INTO teams(name, win, lose) VALUES(:name, :win, :lose)", [
            'name' => $_POST['name'],
            'win' => $_POST['win'],
            'lose' => $_POST['lose']
        ]) ->statement ->fetchAll();
    }

}

views('teams/create.view.php', [
    'heading' => 'New Team'
]);