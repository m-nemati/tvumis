<?php

$serverName="localhost";
$dataBaseName="tvumis";
$username="root";
$password="";

$dsn="mysql:host=$serverName; dbname=$dataBaseName;charset=utf8";

try{

    $strcon=new PDO($dsn,$username,$password);
   
}

catch(PDOEXCEPTION $e){
    echo ("خطا در ارتباط با  پایگاه");
}

?>
