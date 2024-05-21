<?php
include "koneksi.php";
session_start();

$name     = $_POST['name'];
$email    = $_POST['email'];
$password = $_POST['password'];
$role     = 'user';

$isEmailExist = $conn->query("SELECT email FROM user WHERE email = '$email'");
if ( $isEmailExist->num_rows > 0 ) {
    $_SESSION['error'] = "Email Already Exist";
    header("Location: /register.php");
    exit();
    }

$sql = "INSERT INTO user (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";
if ( ! $conn->query($sql) ) {
    $_SESSION['error'] = $conn->error;
    header("Location: /register.php");
    exit();
    }

$_SESSION['success'] = "Register Success";
header("Location: /index.php");
exit();