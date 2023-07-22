<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];

if (! Validator::inputString($password, 8, 255)) {
    $errors['pass'] = 'At least 8 chars are required for the password.';
}

if(!Validator::emailValue($email)){
    $errors['email'] = 'This email is invalid.';
}

if(! ($confirm === $password)){
    $errors['pass'] = 'Passwords doesn\'t match.';
}

$user = $db -> query("select * from users where email = :email", [
    'email' => $email
]) ->statement ->fetch();

if($user) $errors['email'] = 'This email is already registered.';


if (! empty($errors)) {
    views("register/create.view.php", [
        'errors' => $errors,
        'email'  => $email,
        'heading' => 'Register'
    ]);
} else {
    $db -> query("INSERT INTO users(email, password) VALUES(:email, :password)", [
        'email' => $email,
        'password' => password_hash($password,PASSWORD_BCRYPT)
    ]) ->statement ->fetchAll();
}


header('location: /login');
die();