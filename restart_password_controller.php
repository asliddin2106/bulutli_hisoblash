<?php
session_start();
if($_SESSION['login_qilindi']==FALSE){     
    header("Location: login.php");     
    exit; 
} 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['id'])) {
    $con = new mysqli('localhost', 'root', '', 'maktab');

    if ($con->connect_error) {
        die("Ulanishda xatolik: " . $con->connect_error);
    }

    $password = $_POST['password'];
    $id = $_SESSION['id'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE student SET password='$hashed_password' WHERE id='$id'";
    $result = $con->query($query);

    if ($result) {
        $_SESSION['status'] = 'Ma\'lumot o‘zgartirildi';
        header("Location: login.php");
        exit();
    } else {
        echo "Xatolik yuz berdi: " . $con->error;
    }
} 
?>
