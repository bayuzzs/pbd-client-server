<?php
include 'koneksi.php';

$post = $conn->query("SELECT count(postId) FROM post")->fetch_assoc();

echo $post['count(postId)'];