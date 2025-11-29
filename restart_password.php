<?php
session_start();
if($_SESSION['login_qilindi']==FALSE){     
    header("Location: login.php");     
    exit; 
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="restart_password_controller.php" method="POST">
        <label for="password">Parol</label>
        <input type="text" name="password" required>
        <label for="password_r">Parolni takrorlang</label>
        <input type="text" name="password_r" required>
        <input type="text" value="<?=$_SESSION['id']?>" hidden>
        <button type="submit">Submit</button>
    </form>
</body>
</html>