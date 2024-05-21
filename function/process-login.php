<?php
include "koneksi.php";
session_start();

$email    = $_POST['email'];
$password = $_POST['password'];


$sql  = "SELECT * FROM user WHERE email = '$email' AND password = '$password' AND role = 'user'";
$user = $conn->query($sql);

if ( $user->num_rows == 0 ) {
    $_SESSION['error'] = "Login Yang Bener";
    header("location: /index.php");
    exit();
    }
$conn->query("UPDATE user SET status = 'online' WHERE email = '$email'");
$_SESSION['user']    = $user->fetch_assoc();
$_SESSION['success'] = "Login Success";
header("location: /halaman-utama.php");
exit();