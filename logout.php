<?php
session_start();
require_once 'vendor/connect.php' ;
unset($_SESSION['user']);
header('Location: index.php');
?>
