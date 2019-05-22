
<?php

session_start();
if (!isset( $_SESSION['loginOK'])){
    header("location:../login/login.php"); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>پنل کاربری</title>
    <link rel="stylesheet" href="../../css/font.css">
    <link rel="stylesheet" href="../../css/stupanel.css">
</head>
<body>
    <h2>
         خوش آمدید
    </h2>
    <p>
    <span>نام کاربر جاری:</span>
    <span>
    <?php
    echo ( $_SESSION['adminName']);
    ?>
    </span>
    
    </p>
    <p><a href="../login/logout.php">خروج از حساب کاربری</a></p>
</body>
</html>