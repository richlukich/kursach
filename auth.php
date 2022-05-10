<?php

session_start();
require_once 'connect.php';

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$password_confirm=$_POST['password_confirm'];

if ($password===$password_confirm) {
    mysqli_query($connect,"INSERT INTO `users` (`id`, `Name`, `email`, `password`) VALUES (NULL, '$name', '$email', '$password')");
    $_SESSION['message']='Регистрация прошла успешно';
    header('Location:auth.php');
}
else {
    $_SESSION['message']='Пароли не совпадают';
    header('Location:registration.php');
}
?>