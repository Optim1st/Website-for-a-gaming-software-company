<?php
session_start();
$user_login = $_SESSION['logged_user']['username'];

require_once 'db.php';
mysqli_select_db($conn,$db);

$week = mysqli_query($conn, "UPDATE `week` SET `username` = '$user_login' WHERE `promocode` IS NOT NULL and `username` IS NULL and `uniquecode` IS NULL LIMIT 1");

 ?>
