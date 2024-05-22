<?php
$servername = "0.tcp.ap.ngrok.io";
$port       = "16259";
$username   = "root";
$password   = "";
$dbname     = "pesbuk";

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ( $conn->connect_error ) {
    die("Koneksi gagal: " . $conn->connect_error);
    }