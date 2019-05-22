<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> ورود اعضا</title>
    <link rel="stylesheet" href="../../css/font.css">
    <link rel="stylesheet" href="../../css/login.css">
</head>
<body>
    <div class="main">
    <img src="../../images/logicon.png" alt="Login Icon">
    <form action="checklogin.php" method="post">
        <input type="text" name="us" placeholder="نام کاربری" required autofocus>
        <span>
            <?php
                if(isset($_SESSION['errorUS'])){
                    echo ($_SESSION['errorUS']);
                    unset($_SESSION['errorUS']);
                }
            ?>
        </span>
        <br><br>
        <input type="password" name="ps" placeholder="رمز عبور" required>
        <span>
        <?php
                if(isset($_SESSION['errorPS'])){
                    echo ($_SESSION['errorPS']);
                    unset($_SESSION['errorPS']);
                }
            ?>
        </span>
        <br><br>
        <input type="submit" value="ورود" name="submit">
        <br><br>
        <div id="recaptcha" class="g-recaptcha" data-sitekey="6LfXOKQUAAAAAAjMxBKROrG_HOUf2OKEckAIFL4p">

        </div>
    </form>
    <div id="errorMessage">
    <?php
                if(isset($_SESSION['errorLog'])){
                    echo ($_SESSION['errorLog']);
                    unset($_SESSION['errorLog']);
                }
            ?>
    </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js"></script>
</body>
</html>