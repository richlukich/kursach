<?php
session_start();
$connect=mysqli_connect('localhost','root','root','kursach');
$result= mysqli_query($connect," SELECT * FROM `moderated_reviews`");
?>
<?php if ($_SESSION['txt1']){ ?>
<script type="text/javascript">
    alert ('Ваша статья отправлена на модерацию! :)')
</script>
<?php } 
unset ($_SESSION['txt1']); 
?>

<?php if ($_SESSION['txt2']){ ?>
    <script type="text/javascript">
        alert ('Статья успешно удалена!')
    </script>
    <?php } 
    unset ($_SESSION['txt2']); ?>

<?php if ($_SESSION['txt3']){ ?>
    <script type="text/javascript">
        alert ('Статья успешно сохранена')
    </script>
    <?php } 
    unset ($_SESSION['txt3']); ?>   
    

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title> Сайт ресторанных критиков </title>
    <link rel="stylesheet" type="text/css" href="css/main.css">


</head>

<body> 
    <div class="block"> 
        <img src="fone.jpg" alt="background"> 
    </div>
    <div class="chapter">Сайт ресторанной критики №1</div>

        <div class="panel"> 
            <div class="logo">
                <img src="logo.jpg" alt="background">
            </div>

            <div class="menu">
                <div class="profile">
                    <img src="profile.png" alt="background">
                    <?php if ($_SESSION['user']['level']==1) { ?>
                        <p align="center" > Добро пожаловать, <?php echo $_SESSION['user']['login'] ?> </p>

                        <a href="add_article.php" class="link"> Добавить статью </p>

                        <a href="logout.php" class="link"> Выйти </a>
                    <?php } elseif ($_SESSION['user']['level']==2) { ?>
                        <p align="center" > Добро пожаловать, <?php echo $_SESSION['user']['login'] ?> </p>

                        <a href="moderation.php" class="link"> Посмотреть отзывы </p>

                        <a href="logout.php" class="link"> Выйти </a>
                        
                    <?php } else { ?>
                        <a href="authorization.php" class="link"> Войти </a>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="reviews">
    
            <?php
                while ($reviews=mysqli_fetch_assoc($result))
                {
            ?>      
                    <form action="article.php" target="_blank" method="post" enctype="multipart/form-data">
                        <div class="review">
                            <div class="article">
                                <input type="hidden" value= "<?php echo $reviews['article']; ?>" name="article" >
                                <?php echo $reviews['article']; ?>  
                            </div>

                            <div class="date">
                                <?php echo $reviews['added_on']; ?>
                            </div>

                            <div class="text">
                                <?php echo  $reviews['review']; ?>
                            </div>

                            <button class="button"> Читать далее </button>
                        </div>
                    </form>

            <?php
                }
            ?>
        </div>


</body>