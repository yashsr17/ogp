<?php 
session_start();
unset($_SESSION['phnum']);
header('location:user_signup.php');
?>