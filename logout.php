<?php
session_start();
if($_SESSION['login_qilindi']==FALSE){     
    header("Location: login.php");     
    exit; 
} 
session_unset($_SESSION['login_qilindi']);
$_SESSION['error']='Tizimdan chiqdingiz';
header("Location: login.php");
exit();
