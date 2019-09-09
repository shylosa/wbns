<?php

$errors = [];

if (empty($_POST['name'])) {
    $errors['name'] = 'Введите name';
}

if (empty($_POST['post'])) {
    $errors['post'] = 'Введите сообщение';
}

//if ($errors) {
//    include 'index.php';
//    exit();
//}

header('Location: index.php');