<?php
session_start();
if ( ! isset($_SESSION['user']) ) {
    header('Location: index.php');
    exit();
    }

$error   = isset($_SESSION['error']) ? $_SESSION['error'] : false;
$success = isset($_SESSION['success']) ? $_SESSION['success'] : false;
unset($_SESSION['error']);
unset($_SESSION['success']);

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
    <div id="myToast" class="absolute bottom-0 right-10 hidden">
        <div class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md  my-5
    ">
            <div class="flex items-center justify-center w-12 bg-blue-500">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z" />
                </svg>
            </div>

            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-blue-500 ">Info</span>
                    <p class="text-sm text-gray-600 ">
                        This channel archived by the owner!
                    </p>
                </div>
            </div>
        </div>
    </div>
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>