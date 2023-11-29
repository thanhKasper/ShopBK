<?php 
include '../model/insertAccount.php';
$username = $_POST['username'];
$email = $_POST['email'];
$pwd = $_POST['password'];

$hashPwd = hash('sha256', $pwd);

insertAccount($username, $email, $hashPwd);
?>