<?php
$servername = "0.tcp.ap.ngrok.io:10144";
$username   = "root";
$password   = "";
$dbname     = "pesbuk";

$conn = new mysqli($servername, $username, $password, $dbname);

if ( $conn->connect_error ) {
    die("Koneksi gagal: " . $conn->connect_error);
    }