<?php
session_start();
if ($_SESSION['user']['level']!=2){
    header('Location: index.php');
}
$connect=mysqli_connect('localhost','root','root','kursach');
$article= $_POST['article'];
mysqli_query($connect,"DELETE FROM `reviews` WHERE `reviews`.`article` = '$article' ");
$_SESSION['txt2']='Статья успешно удалена!';
header('Location: moderation.php');
?>