<?php
session_start();
if ( isset($_SESSION['user']) ) {
    if ( $_SESSION['user']['role'] != 'admin' ) {
        header('Location: halaman-utama.php');
        exit();
        }
    if ( $_SESSION['user']['role'] == 'admin' ) {
        header('Location: admin.php');
        exit();
        }
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
    <!-- component -->
    <div class="min-h-screen flex items-center justify-center w-full dark:bg-gray-950">
        <div class="bg-white dark:bg-gray-900 shadow-md rounded-lg px-8 py-6 max-w-md min-w-[400px]">
            <h1 class="text-2xl font-bold text-center mb-4 dark:text-gray-200">Login Admin</h1>
            <?php if ( $error ): ?>
                <div
                    class="font-regular relative block w-full rounded-lg bg-pink-500 p-4 text-base leading-5 text-white opacity-100">
                    <?= $error ?>
                </div>
            <?php endif; ?>
            <?php if ( $success ): ?>
                <div
                    class="font-regular relative block w-full rounded-lg bg-blue-500 p-4 text-base leading-5 text-white opacity-100">
                    <?= $success ?>
                </div>
            <?php endif; ?>
            <form action="/function/process-login-admin.php" method="POST">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email
                        Address</label>
                    <input type="text" id="email"
                        class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="your@email.com" name="email" required>
                </div>
                <div class="mb-4">
                    <label for="password"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Password</label>
                    <input type="password" id="password"
                        class="shadow-sm rounded-md w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Enter your password" name="password" required>
                </div>
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Login</button>
            </form>
        </div>
    </div>
</body>

</html>