<?php
session_start();
if ( ! isset($_SESSION['user']) ) {
    header('Location: index.php');
    exit();
    }
if ( $_SESSION['user']['role'] != 'admin' ) {
    header('Location: halaman-utama.php');
    exit();
    }

include "function/koneksi.php";

$sql   = "SELECT * FROM user WHERE role = 'user'";
$users = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);

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
    <div class="min-h-screen w-full p-5">
        <!-- component -->
        <div class="flex justify-between">
            <h1 class="text-2xl font-semibold">Daftar Akun Pengguna</h1>
            <div class="flex gap-2">
                <a href="logout.php" class="px-2 py-1 bg-red-500 text-white rounded-md">logout</a>
            </div>
        </div>
        <!-- component -->
        <section class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4 mx-auto mt-24">
            <div class="">
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                    <div class="block w-full overflow-x-auto">
                        <table class="items-center bg-transparent w-full border-collapse ">
                            <thead>
                                <tr class="bg-slate-100">
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Nama
                                    </th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Email
                                    </th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                        Status
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ( $users as $user ): ?>
                                    <tr class="hover:bg-slate-100">
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            <?= $user['name'] ?>
                                        </td>
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            <?= $user['email'] ?>
                                        </td>
                                        <td
                                            class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            <?= $user['status'] ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </section>

    </div>
</body>

</html>