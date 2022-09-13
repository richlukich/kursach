<?php
session_start();
if ($_SESSION['user']['level']!=1 or empty($_SESSION['user'])){
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title> Сайт ресторанных критиков </title>
    <link rel="stylesheet" type="text/css" href="css/add_article.css">
</head>

<body>
        <main>
            <script src="ckeditor.js"> </script>
            <form action="check.php" method="post" enctype="multipart/form-data">
                <div class="review">
                    <div class="article">
                        <input type="text" placeholder="Введите название статьи" name ="article" size="100" >
                    </div>
                    <div class="circle"> </div>
                    <textarea id="editor" name="editor">
                    </textarea>
                    <div class="form-buttons">
                        <button class="button" name='submit'> Отправить статью </button>
                    </div>
                    <div class="circle"> </div>
                    <?php
                    if ($_SESSION['MSG'])
                    {
                        echo '<p class="msg">' .$_SESSION['MSG'] . '</p>';
                    } 
                    unset ($_SESSION['MSG']);

                    if ($_SESSION['MSG1'])
                    {
                        echo '<p class="msgg">' .$_SESSION['MSG1'] . '</p>';
                    } 
                    unset ($_SESSION['MSG1']);
                    ?>
    
                </div>

                
            </form>
        </main>
    <script>
    CKEDITOR.replace('editor');
    </script>
</body>
