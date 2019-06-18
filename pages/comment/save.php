<?php
session_start();
//Import Database File
require_once ("../connect/connect.php");
$items=['email','comment','name'];
foreach ($items as $key => $value) {
    if(!isset($_POST[$value]))
    {
        header('Location: /../pages/aboutme.php');
        exit();
    }
}
$st2=$strcon->prepare("INSERT INTO comment (`email`, `comment`, `name`) VALUES (:email, :comment, :name)");
$st2->bindparam(':email',$_POST['email']);
$st2->bindparam(':name',$_POST['name']);
$st2->bindparam(':comment',$_POST['comment']);

$st2->execute($data);
header('Location: /../pages/aboutme.php');
exit();
