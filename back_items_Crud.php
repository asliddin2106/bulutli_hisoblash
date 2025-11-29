<?php

if($_SESSION['login_qilindi']==FALSE){     
    header("Location: login.php");     
    exit; 
} 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['orqaga']=True;
    header("Location: items_CRUD.php");
}
