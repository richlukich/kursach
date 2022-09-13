<?php
session_start();
if ($_SESSION['user']['level']!=2){
    header('Location: index.php');
}
    $connect=mysqli_connect('localhost','root','root','kursach');
    $article= $_POST['article'];
    $result= mysqli_query($connect," SELECT * FROM `reviews` WHERE `article`='$article' ");
    $reviews=mysqli_fetch_assoc($result);
    $review=$reviews['review'];
    $article=$reviews['article'];
    $added_on=$reviews['added_on'];
    $query= mysqli_query($connect,"INSERT INTO `moderated_reviews` (`id`, `review`, `article`, `added_on`) VALUES (NULL, '$review', '$article', '$added_on')");
    mysqli_query($connect,"DELETE FROM `reviews` WHERE `reviews`.`article` = '$article' ");
    $_SESSION['txt3']='Статья успешно сохранена!';
    header('Location: moderation.php');

?>