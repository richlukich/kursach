<?php
session_start();
if ($_SESSION['user']['level']!=2){
    header('Location: index.php');
}
$connect=mysqli_connect('localhost','root','root','kursach');
$article= $_POST['article'];
$result= mysqli_query($connect," SELECT * FROM `reviews` WHERE `article`='$article' ");
$reviews=mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title> Сайт ресторанных критиков </title>
    <link rel="stylesheet" type="text/css" href="css/article.css">

    <div class = "text">
        <div class = "article">
            <p class="h1" align="center"> <?php echo $reviews['article'] ?> </p>
        </div>
        <div class = "review">
            <p class="h2"> <?php echo $reviews['review'] ?> </p>
        </div>

                <form action="save_review.php" method="post">
                    <input type="hidden" value= "<?php echo $reviews['article']; ?>" name="article" >
                    <div class="form-buttons">
                        <button class="button1"> Сохранить </button>
                    </div>
                </form>

                <form action="change_review1.php" method="post">
                <?php foreach($reviews as $review){
                    echo '<input type="hidden" name="result[]" value="'. $review. '">';
                    $_SESSION['text']=$reviews;
                }
                ?>

                    <div class="form-buttons">
                        <button class="button1">  Редактировать </button>
                    </div>
                </form>
                <form action="delete_review1.php" method="post">
                    <input type="hidden" value ="<?php echo $reviews['article']; ?> " name ="article" >
                    <div class="form-buttons">
                        <button class="button2">  Удалить </button>
                    </div>
                </form>
        
        </div>

</head>