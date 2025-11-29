<?php 
session_start();  
if($_SESSION['login_qilindi']==FALSE){     
    header("Location: login.php");     
    exit; 
}    
$user_id=$_SESSION['id'];
$con = new mysqli('localhost', 'root', '','maktab');  
$result = $con->query("SELECT * FROM darslar where student_id='$user_id'"); 
?> 

<!DOCTYPE html>
<html>
<head>
    <title>Darslar ro‘yxati</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #007BFF;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn {
            background-color: #007BFF;
            border: none;
            color: white;
            padding: 8px 16px;
            margin: 10px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .center {
            text-align: center;
        }

        .action-links {
            display: flex;
            gap: 10px;
            justify-content: center;
        }
    </style>
</head>
<body>

<h2>Darslar ro‘yxati</h2>

<div class="center">
    <form action="logout.php" method='POST' style="display:inline;">
        <button class="btn" type='submit'>Chiqish</button>
    </form>
    <a href="add_subject.php" class="btn">Fan qo‘shish</a>
</div>

<table>
    <tr>
        <th>ID</th>
        <th>Dars nomi</th>
        <th>Davomiyligi</th>
        <th>Amallar</th>
    </tr>

    <?php if ($result && $result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nomi'] ?></td>
                <td><?= $row['davomiyligi'] ?></td>
                <td class="action-links">
                    <a href="delete_item.php?id=<?= $row['id'] ?>" onclick="return confirm('Rostdan ham o‘chirmoqchimisiz?')">🗑 O‘chirish</a>
                    <a href="add_subject.php?id=<?= $row['id'] ?>">✏ Tahrirlash</a>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="4">Hozircha darslar mavjud emas</td></tr>
    <?php endif; ?>
</table>

<?php 
if ($_SESSION['login_qilindi']==TRUE && $_SESSION['orqaga']==TRUE):  
    $_SESSION['orqaga']=False; 
?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            icon: 'success',
            text: 'Muvaffaqqiyatli tizimga kirdingiz!',
            confirmButtonColor: '#007BFF'
        });
    </script>
<?php endif; ?>

</body>
</html>
