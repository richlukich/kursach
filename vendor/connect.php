<?php

    $connect=mysqli_connect('localhost:3306','root','admin','users');

    if (!$connect) {
    die('Error connect to DataBase');
    }

