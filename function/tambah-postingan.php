<?php
session_start();
include 'koneksi.php';
$userId      = $_SESSION['user']['userId'];
$title       = $_POST['title'];
$description = $_POST['description'];
$date        = date('Y-m-d');

$image = mysqli_escape_string($conn, file_get_contents($_FILES["image"]["tmp_name"]));
$query = "INSERT INTO post (title, description, image, userId, datePost) VALUES ('$title', '$description', '$image', '$userId', '$date')";
if ( $conn->query($query) ) {
    $_SESSION['success'] = 'Postingan berhasil ditambahkan';
    header('Location: /halaman-utama.php');
    exit();
    } else {
    $_SESSION['error'] = 'Postingan gagal diupload';
    header('Location: /tambah-postingan.php');
    exit();
    }
