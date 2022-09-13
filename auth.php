<?php

session_start();
require_once 'vendor/connect.php';

$login=$_POST['login'];
$email=$_POST['email'];
$password=$_POST['password'];
$password_confirm=$_POST['password_confirm'];
$level= 1;

if ($password===$password_confirm) {
    $password=md5($password);
    mysqli_query($connect,"INSERT INTO `users` (`id`, `login`, `email`, `password`, `level`) VALUES (NULL, '$login', '$email', '$password',$level)");
    $_SESSION['message']='Регистрация прошла успешно';
    header('Location: authorization.php');
}
else {
    $_SESSION['message']='Пароли не совпадают';
    header('Location: registration.php');
}
?>