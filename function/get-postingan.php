<?php
include 'koneksi.php';

$posts = $conn->query("SELECT * FROM post JOIN user ON (post.userId = user.userId) ORDER BY postId DESC");

if ( $posts->num_rows == 0 ) {
    echo '<h1 class="text-2xl font-semibold">Belum ada post</h1>';
    exit();
    }

if ( $posts->num_rows > 0 ) {
    while ( $post = $posts->fetch_assoc() ) {
        echo '
                <article
                    class="bg-white  p-6 mb-6 shadow transition duration-100 group transform hover:shadow-lg rounded-2xl  border">
                    <div class="relative mb-4 rounded-2xl overflow-hidden  ">
                        <img class="max-h-32 rounded-2xl w-full object-cover bg-center transition-transform duration-100 transform group-hover:scale-105"
                            src="data:image/*;base64,' . base64_encode($post['image']) . '"
                            alt="">
                    </div>
                    <div class="flex justify-between items-center w-full pb-4 mb-auto">
                        <div class="flex items-center">
                            <div class="pr-3">
                                <img class="h-12 w-12 rounded-full object-cover" src="user.png" alt="">
                            </div>
                            <div class="">
                                <p class="text-sm font-semibold">' . $post['name'] . '</p>
                                <p class="text-sm text-gray-500">Published on ' . $post['datePost'] . '</p>
                            </div>
                        </div>
                    </div>
                    <h3 class="font-medium text-lg leading-8 text-left">
                        ' . $post['title'] . '
                    </h3>
                    <p class="text-sm text-gray-500 leading-6 text-left">
                        ' . $post['description'] . '
                    </p>
                    <div>
                    </div>
                </article>';
        }
    }
?>