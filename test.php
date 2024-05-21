<?php
include 'function/koneksi.php';

$posts = $conn->query("SELECT * FROM post JOIN user ON (post.userId = user.userId) ORDER BY datePost DESC ")->fetch_all(MYSQLI_ASSOC);

var_dump($posts);