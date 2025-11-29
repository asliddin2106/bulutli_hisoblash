<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = new mysqli('localhost', 'root', '', 'maktab');
    $email = $_POST['email'];

    if (!empty($email)) {
        $query = "SELECT * FROM student WHERE email='$email'";
        $result = $con->query($query);

        if ($result->num_rows > 0) {
            $_SESSION['email'] = $email;
            header("Location: unutish.php");
            exit();
        } else {
            $_SESSION['status'] = "Bu email ro'yxatdan o'tmagan";
        }
    } else {
        $_SESSION['status'] = "Email maydoni bo'sh bo'lmasligi kerak";
    }
    // POST so'rovdan keyin yana shu sahifa ochiladi
}
?>

<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Email tekshiruv</title>
</head>
<body>
    <h1>Tizimdan ro'yxatdan o'tgan emailni kiriting</h1>
    
    <?php
    if (isset($_SESSION['status'])) {
        echo "<p style='color:red'>" . $_SESSION['status'] . "</p>";
        unset($_SESSION['status']);
    }
    ?>
    
    <form action="find_user.php" method="POST">
        <label for="email">Email:</label>
        <input type="text" name="email" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
