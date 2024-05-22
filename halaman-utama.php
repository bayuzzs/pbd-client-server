<?php
include 'function/koneksi.php';
session_start();
if ( ! isset($_SESSION['user']) ) {
    header('Location: index.php');
    exit();
    }

$error   = isset($_SESSION['error']) ? $_SESSION['error'] : false;
$success = isset($_SESSION['success']) ? $_SESSION['success'] : false;
unset($_SESSION['error']);
unset($_SESSION['success']);

$posts = $conn->query("SELECT * FROM post JOIN user ON (post.userId = user.userId) ORDER BY postId DESC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesbuk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <!-- component -->
    <div class="min-h-screen w-full p-5">
        <div class="flex justify-between bg">
            <h1 class="text-2xl font-semibold">Pesbuk</h1>
            <div class="flex gap-2">
                <a href="tambah-postingan.php" class="px-2 py-1 bg-purple-500 text-white rounded-md">tambah</a>
                <a href="logout.php" class="px-2 py-1 bg-red-500 text-white rounded-md">logout</a>
            </div>
        </div>
        <!-- component -->
        <div>
            <?php if ( $error ): ?>
                <div
                    class="mt-5 font-regular relative block w-full rounded-lg bg-pink-500 p-4 text-base leading-5 text-white opacity-100">
                    <?= $error ?>
                </div>
            <?php endif; ?>
            <?php if ( $success ): ?>
                <div
                    class="mt-5 font-regular relative block w-full rounded-lg bg-blue-500 p-4 text-base leading-5 text-white opacity-100">
                    <?= $success ?>
                </div>
            <?php endif; ?>
            <h1 class="text-xl font-semibold mt-5">Postingan Temen Kamu</h1>
            <div class="bg-cover w-full flex justify-center items-center">
                <div class=" w-full bg-white p-5 bg-opacity-40 backdrop-filter backdrop-blur-lg">
                    <div
                        class="w-12/12 mx-auto rounded-2xl bg-white p-5 bg-opacity-40 backdrop-filter backdrop-blur-lg">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 text-center px-2 mx-auto"
                            id="postingan">
                            <?php if ( $posts->num_rows == 0 ): ?>
                                <h1 class="text-2xl font-semibold">Belum ada post</h1>
                            <?php endif; ?>

                            <?php if ( $posts->num_rows > 0 ): ?>
                                <?php while ( $post = $posts->fetch_assoc() ): ?>
                                    <article
                                        class="bg-white  p-6 mb-6 shadow transition duration-100 group transform hover:shadow-lg rounded-2xl  border">
                                        <div class="relative mb-4 rounded-2xl overflow-hidden  ">
                                            <img class="max-h-32 rounded-2xl w-full object-cover bg-center transition-transform duration-100 transform group-hover:scale-105"
                                                src="data:image/*;base64,<?= base64_encode($post['image']) ?>   " alt="">
                                        </div>
                                        <div class="flex justify-between items-center w-full pb-4 mb-auto">
                                            <div class="flex items-center">
                                                <div class="pr-3">
                                                    <img class="h-12 w-12 rounded-full object-cover" src="user.png" alt="">
                                                </div>
                                                <div class="">
                                                    <p class="text-sm font-semibold"><?= $post['name'] ?></p>
                                                    <p class="text-sm text-gray-500">Published on <?= $post['datePost'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <h3 class="font-medium text-lg leading-8 text-left">
                                            <?= $post['title'] ?>
                                        </h3>
                                        <p class="text-sm text-gray-500 leading-6 text-left">
                                            <?php $post['description'] ?>
                                        </p>
                                        <div>
                                        </div>
                                    </article>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>