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
    <!-- component -->
    <div class="min-h-screen w-full p-5">
        <a href="/halaman-utama.php" class="text-white hover:bg-blue-600 px-3 rounded-md py-2 bg-blue-500">Kembali</a>
        <div class="max-w-lg bg-white p-8 rounded-lg mx-auto shadow-md ">
            <h2 class="text-2xl font-bold mb-6">Buat Postingan Baru</h2>
            <?php if ( $error ): ?>
                <div
                    class="font-regular relative block w-full rounded-lg bg-pink-500 p-4 text-base leading-5 text-white opacity-100">
                    <?= $error ?>
                </div>
            <?php endif; ?>
            <form id="myForm" action="/function/tambah-postingan.php" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="judul" class="block text-gray-700 font-bold mb-2">Judul:</label>
                    <input type="text" id="judul" name="title"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div class="mb-4">
                    <label for="deskripsi" class="block text-gray-700 font-bold mb-2">Deskripsi:</label>
                    <textarea id="deskripsi" name="description" rows="4"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required></textarea>
                </div>
                <div class="mb-4">
                    <label for="gambar" class="block text-gray-700 font-bold mb-2">Upload Gambar:</label>
                    <div class="mt-4">
                        <img id="preview" class="preview-image hidden w-[400px] h-[200px] object-cover"
                            alt="Image Preview">
                    </div>
                    <input type="file" id="gambar" name="image" accept="image/*"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <button type="submit" name="submit"
                    class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Submit</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('gambar').addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const preview = document.getElementById('preview');
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>

</html>