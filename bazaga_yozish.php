<?php
session_start();

$con=new mysqli('localhost','root','','');

$sql='CREATE DATABASE IF NOT EXISTS maktab';

if($con->query($sql)==TRUE){
    echo 'baza yaratildi';
}
$con->select_db("maktab");

$table='CREATE TABLE IF NOT EXISTS student(
    ism varchar(34),
    familiya varchar(34),
    email varchar(34),
    password varchar(34)
)';

if($con->query($table)){
    echo 'table yaratildi';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ism = $_POST['ism'];
    $familiya = $_POST['familiya'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($ism && $email && $password){
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "SELECT * FROM student WHERE email='$email'";
    $result = $con->query($query);
    if($result->num_rows ==0){
        $query = "INSERT INTO student (ism, familiya, email, password) 
              VALUES ('$ism', '$familiya', '$email', '$hashed_password')";
        if($con->query($query)!=True)
        {
            $_SESSION['status']='malumot saqlanmadi';
        }
        else{
            $_SESSION['status']='malumot saqlandi';
        }
        header("Location: login.php");
        exit();
    }
    else{
        $_SESSION['status']="bu email ro'xatdan o'tgan";
        header("Location: register.php");
        exit();
    }
    }
} else {
    echo "salom";
}
mysqli_close($con);