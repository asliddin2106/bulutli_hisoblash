<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $con = new mysqli('localhost', 'root', '', 'maktab');

    $query = "SELECT * FROM student WHERE email = '$email'";
    $result = $con->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['login_qilindi'] = TRUE;
            $_SESSION['id'] = $user['id'];
            header("Location: items_CRUD.php");
            exit();
        } else {
            $_SESSION['login_qilindi'] = FALSE;
            $_SESSION['error'] = "login parol noto‘g‘ri!";
            header('Location:login.php');
            exit();
        }
    } else {
        $_SESSION['error'] = "Email topilmadi";
        header("Location: login.php");
        exit();
    }
}
else{
    header("Location:login.php");
    exit();
}
?>
