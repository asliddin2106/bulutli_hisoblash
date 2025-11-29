<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['kodni_qayta_yuborish'])) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'bestloved34@gmail.com';
            $mail->Password = 'nxvs jxbz jmut uwop';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('bestloved34@gmail.com', 'Xabar Yuboruvchi');
            $mail->addAddress($_SESSION['email'], 'Qabul qiluvchi');

            $kod = rand(10000, 99999);
            $_SESSION['kod'] = $kod;

            $mail->isHTML(false);
            $mail->Subject = 'Login Register';
            $mail->Body = "Bu kodni siz yo'qolgan parolni tekshirish uchun ishlatsangiz bo'ladi.
            Iltimos bu kodni begona insonlarga aytmang.Sizning kodingiz: " . $kod;

            $mail->send();
            echo "Kod : <a>".$_SESSION['email']."</a> ga yubordik!";
        } catch (Exception $e) {
            echo "Xabar yuborilmadi. Xatolik: {$mail->ErrorInfo}";
        }
    }

    if (isset($_POST['kod'])) {
        $kelgan_kod = $_POST['kod'];
        if (isset($_SESSION['kod']) && $_SESSION['kod'] == $kelgan_kod) {
            header("Location:restart_password.php");
        } else {
            echo "Kod noto'g'ri!";
        }
    }
}
?>

<form method="post">
    <input type="text" name="kod" placeholder="Kod kiriting" required><br>
    <button type="submit">Tekshirish</button>
</form>

<form method="post">
    <button type="submit" name="kodni_qayta_yuborish">Kodni yuborish</button>
</form>
