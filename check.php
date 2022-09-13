<?php
session_start();
if ($_SESSION['user']['level']!=1 or empty($_SESSION['user'])){
    header('Location: index.php');
}

if (isset($_POST['submit'])){
    $connect=mysqli_connect('localhost','root','root','kursach');

    $article=$_POST['article'];
    if (empty($article)){
        $_SESSION['MSG']='Введите название статьи!';
        header('Location: add_article.php');
    }
    else {
        $review=$_POST['editor'];
        $added_on=date('Y-m-d h:i:s');

        $check_review=mysqli_query($connect,"SELECT * FROM `moderated_reviews` WHERE `article`='$article' ");
        if (mysqli_num_rows($check_review)>0){
            $_SESSION['MSG']='Уже существует статья с таким названием!';
            header('Location: add_article.php');
        }
        else {
            $sql="insert into reviews(review,article,added_on) values ('$review','$article','$added_on')";
            mysqli_query($connect,$sql);
            $_SESSION['txt1']='Ваша статья отправлена на модерацию! :)';
            header('Location: index.php');
            }
        }
}
?>