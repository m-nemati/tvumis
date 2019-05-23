<?php
session_start();
//Import Database File
require_once ("../connect/connect.php");

if(isset($_POST['submit'])){

    //Check captcha
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
        
        $captcha=$_POST['g-recaptcha-response'];
  
        $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=???&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
        if($response['success'] == false)
        {   
            $_SESSION['err_login']="You are spammer!";
            header('location:login.php');
            
         }
         else{
             //Check Username field
    if(empty($_POST['us'])){
        $_SESSION['errorUS']="نام کاربری را وارد کنید";
        header("location:login.php");
    }
    else{
        $us=$_POST['us'];
    }

  

    //Check Password field
    if(empty($_POST['ps'])){
        $_SESSION['errorPS']="نام کاربری را وارد کنید";
        header("location:login.php");
    }
    else{
        $ps=hash("sha512",$_POST['ps']);
        
    }
    
    //SQL Query

    $st= $strcon->prepare("SELECT * FROM tbl_users WHERE useracc=:us AND pass=:ps ");
    $st->bindParam(':us',$us);
    $st->bindParam(':ps',$ps);
    $st->execute();

    $st->setFetchMode(PDO::FETCH_ASSOC);
    $row=$st->fetch();
    if($st->rowCount()>0){
        switch ($row['type']){
            case 1:
                $_SESSION['loginOK']="true";
                $_SESSION['adminName']=$row['fname']." ".$row['lname'];
                header("location:../panel/adminpanel.php"); 
                break;

            case 2:
                $_SESSION['loginOK']="true";
                $_SESSION['stuName']=$row['fname']." ".$row['lname'];
                header("location:../panel/stupanel.php");
                break;

            case 3:
                $_SESSION['loginOK']="true";
                $_SESSION['stuName']=$row['fname']." ".$row['lname'];
                header("location:../panel/teacherpanel.php");
                break;
        }
         
    }
    else{
        $_SESSION["errorLog"]="نام کاربری یا پسورد اشتباه است";
        header("location:login.php");

    }

         }
        }

        else{
            $_SESSION['err_login']="تیک تایید  ربات نبودن را بزنید! ";
            header('location:login.php');
       }
        


    
  



}
?>

