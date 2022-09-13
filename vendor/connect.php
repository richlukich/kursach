<?php

    $connect=mysqli_connect('localhost:3306','root','root','kursach');

    if (!$connect) {
    die('Error connect to DataBase');
    }

