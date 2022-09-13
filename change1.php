<?php
session_start();
if ($_SESSION['user']['level']!=2){
    header('Location: index.php');
}

if (isset($_POST['submit'])){
    $connect=mysqli_connect('localhost','root','root','kursach');

    $article=$_POST['article'];
    if (empty($article)){
        $_SESSION['MSG']='Введите название статьи!';
        $_SESSION['result']=$_SESSION['result'];
        header('Location: change_review1.php');
    }
    else {
        $review=$_POST['editor'];
        $added_on=date('Y-m-d h:i:s');
        $id=$_SESSION['result']['id'];
        $check_review=mysqli_query($connect,"SELECT * FROM `moderated_reviews` WHERE `article`='$article' ");
        if (mysqli_num_rows($check_review)>0){
            $_SESSION['MSG']='Уже существует статья с таким названием!';
            $_SESSION['result']=$_SESSION['result'];
            header('Location: change_review1.php');
        }
        else {
            $query=mysqli_query($connect,"DELETE FROM `reviews` WHERE `reviews`.`id` = $id ");
            $sql="INSERT INTO `moderated_reviews` (`id`, `review`, `article`, `added_on`) VALUES (NULL, '$review', '$article', '$added_on')";
            mysqli_query($connect,$sql);
            $_SESSION['txt3']='Статья успешно сохранена! :)';
            unset ($_SESSION['text']);
            header('Location: moderation.php');
            }
        }
}
?>