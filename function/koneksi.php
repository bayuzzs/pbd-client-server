<?php
$servername = "localhost";
$port       = "3306";
$username   = "root";
$password   = "";
$dbname     = "pesbuk";

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ( $conn->connect_error ) {
    die("Koneksi gagal: " . $conn->connect_error);
    }