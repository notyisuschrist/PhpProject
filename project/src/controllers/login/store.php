<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];
$email = $_POST['email'];
$password = $_POST['password'];

if (!Validator::inputString($password, 8, 255)) {
    $errors['pass'] = 'At least 8 chars are required for the password.';
}

if (!Validator::emailValue($email)) {
    $errors['email'] = 'This email is invalid.';
}

$user = $db->query("select * from users where email = :email", [
    'email' => $email
])->find();

if(isset($user['email'])){
    if (!(password_verify($password, $user['password']) && $user['email'] === $email)) {
        $errors['email'] = 'The email or password is incorrect';
    }
}

if (!empty($errors)) {
    views("login/create.view.php", [
        'errors' => $errors
    ]);
} else {
    login($email, $user['id']);

    header('location: /');
    die();
}
