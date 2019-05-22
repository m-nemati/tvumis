<?php

require_once ("../connect/connect.php");

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$mail=$_POST['mail'];
$stuid=$_POST['stuid'];
$useracc=$_POST['useracc'];
$pass=hashValue($_POST['pass']);
$type=2;

$st2=$strcon->prepare("INSERT INTO tbl_users (fname, lname, email, stuid, useracc, pass,type)
                      VALUES (:fname,:lname,:email,:stuid,:useracc,:pass,:type)");

$st2->bindparam(':fname',$fname);
$st2->bindparam(':lname',$lname);
$st2->bindparam(':email',$mail);
$st2->bindparam(':stuid',$stuid);
$st2->bindparam(':useracc',$useracc);
$st2->bindparam(':pass',$pass);
$st2->bindparam(':type',$type);


$st2->execute();
$strConn=null;

echo("ثبت نام شما با موفقیت انجام شد");


function hashValue($data){

    return hash("sha512",$data);
}


?>
<br>
<a href="../../index.html">بازگشت به صفحه اصلی</a>