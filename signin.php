<?php
session_start();
require_once 'vendor/connect.php' ;

$email=$_POST['email'];
$password=md5($_POST['password']);

$check_user=mysqli_query($connect,"SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password' ");

if (mysqli_num_rows($check_user)>0){

    $user=mysqli_fetch_assoc($check_user);

    $_SESSION['user']=["id"=>$user['id'],
                    "login"=>$user['login'],
                    "email"=>$user['email'],
                    "level"=>$user['level']];
    header('Location: index.php');

}
else{
    $_SESSION['message']='Неверный логин или пароль';
    header('Location: authorization.php');
}
?>