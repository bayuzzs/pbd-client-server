<?php
session_start();
include 'koneksi.php';
$userId      = $_SESSION['user']['userId'];
$title       = $_POST['title'];
$description = $_POST['description'];
$date        = date('Y-m-d');

$rootDir     = dirname(__DIR__);
$targetDir   = $rootDir . "/uploads/";
$fileName    = basename($_FILES["image"]["name"] . date('Y-m-d-H-i-s'));
$target_file = $targetDir . $fileName;



// Check if image file is a actual image or fake image
if ( move_uploaded_file($_FILES["image"]["tmp_name"], $target_file) ) {
    $urlPoster = "/uploads/" . $fileName;
    $query     = "INSERT INTO post (title, description, urlPoster, userId, datePost) VALUES ('$title', '$description', '$urlPoster', '$userId', '$date')";
    if ( $conn->query($query) ) {
        $_SESSION['success'] = 'Postingan berhasil ditambahkan';
        header('Location: /halaman-utama.php');
        exit();
        } else {
        $_SESSION['error'] = 'File gagal diupload';
        header('Location: /tambah-postingan.php');
        exit();
        }
    } else {
    $_SESSION['error'] = 'File gagal diupload';
    header('Location: /tambah-postingan.php');
    exit();
    }
?>