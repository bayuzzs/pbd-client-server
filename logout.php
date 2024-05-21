<?php
session_start();
if ( $_SESSION['user']['role'] == 'user' ) {
    include "function/koneksi.php";
    $email = $_SESSION['user']['email'];
    $conn->query("UPDATE user SET status = 'offline' WHERE email = '$email'");
    }

session_destroy();

header("Location: /");