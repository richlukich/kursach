<?php
session_start();

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,700&display=swap" rel="stylesheet">
    <title> Сайт ресторанных критиков </title>

</head>

<body>
    <main>
        <form action="auth.php" method="post" enctype="multipart/form-data">
        <div class="circle"> </div>
            <div class="register-form-container">
                <h1 class="form-title">
                    Регистрация
                </h1>
                <div class="form-fields">
                    <div class="form-field">
                        <input type="text" name="name" placeholder="Имя">
                    </div>
                    <div class="form-field">
                        <input type="email" name="email" placeholder="Почта">
                    </div>
                    <div class="form-field">
                        <input type="text" name="password" placeholder="Пароль">
                    </div>
                    <div class="form-field">
                        <input type="text" name="password_confirm" placeholder="Подтвердить пароль">
                    </div>
                </div>
                <div class="form-buttons">
                    <button class="button"> Регистрация </button>
                    <div class="devider"> Есть аккаунт?
                    <a href="#" class="link"> Войдите </a>
                    </div> 
                        <?php
                            if ($_SESSION['message']){
                                echo '<p class="message">' .$_SESSION['message'] . '</p>';
                            } 
                            unset ($_SESSION['message']);
                        ?> 
            
                </div>
        </div>
        

    </main>
</body>