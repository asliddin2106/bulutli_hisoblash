<?php
$con = new mysqli('localhost', 'root', '', 'maktab');

if($_SESSION['login_qilindi']==FALSE){     
    header("Location: login.php");     
    exit; 
} 
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM darslar WHERE id = $id";

    if ($con->query($query)) {
        header("Location: items_CRUD.php");
        exit();
    } else {
        echo "Xatolik: " . $con->error;
    }
} else{
    header("Location:login.php");
    exit();
}
?>
