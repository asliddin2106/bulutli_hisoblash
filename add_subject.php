<?php
session_start();

if($_SESSION['login_qilindi']==FALSE){
    header("Location: login.php");
    exit;
}

$con = new mysqli('localhost', 'root', '', 'maktab');

$nomi = "";
$davomiyligi = "";
$editMode = false;

if (isset($_GET['id'])) {
    $editMode = true;
    $id = $_GET['id'];
    $result = $con->query("SELECT * FROM darslar WHERE id = $id");
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nomi = $row['nomi'];
        $davomiyligi = $row['davomiyligi'];
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomi = $_POST['nomi'];
    $davomiyligi = $_POST['davomiyligi'];
    $user_id=$_SESSION['id'];
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        $query = "UPDATE darslar SET nomi = '$nomi', davomiyligi = '$davomiyligi' WHERE id = $id";
    } else {
        $query = "INSERT INTO darslar (nomi, davomiyligi,student_id) VALUES ('$nomi', '$davomiyligi','$user_id')";
    }
    
    if ($con->query($query)) {
        header("Location: items_CRUD.php");
        exit();
    } else {
        echo "Xatolik: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $editMode ? "Darsni tahrirlash" : "Yangi dars qo‘shish" ?></title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        form {
            background-color: white;
            padding: 20px;
            width: 300px;
            margin: 30px auto;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 6px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 8px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 3px;
        }

        button:hover {
            background-color: #45a049;
        }

        .back-btn {
            margin: 0 auto;
            display: block;
            width: 300px;
        }

        .back-btn button {
            background-color: #888;
        }

        .back-btn button:hover {
            background-color: #666;
        }
    </style>
</head>
<body>

<form method="POST">
    <?php if ($editMode): ?>
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
    <?php endif; ?>

    <label>Dars nomi:</label><br>
    <input type="text" name="nomi" value="<?= htmlspecialchars($nomi) ?>" required><br>

    <label>Davomiyligi (soat):</label><br>
    <input type="text" name="davomiyligi" value="<?= htmlspecialchars($davomiyligi) ?>" required><br>

    <button type="submit"><?= $editMode ? "Yangilash" : "Saqlash" ?></button>
</form>

<div class="back-btn">
    <form action="back_items_Crud.php" method="POST">
        <button type="submit">Orqaga</button>
    </form>
</div>

</body>
</html>
