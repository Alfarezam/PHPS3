<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <style>
        input::placeholder {
            color: #a0aec0;
            opacity: 1;
        }

        input:focus::placeholder {
            color: transparent;
        }
    </style> -->
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<!-- Navbar -->
<?php include 'includes/navbar.php'; ?>

<!-- Main container -->
<div class="flex">
    <!-- Sidebar -->
    <?php include 'includes/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="flex-1 p-8">
        <!-- Formulir Input Role -->
        <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Input Barang</h2>
            <form action="index.php?modul=barang&fitur=add" method="POST">
                <!-- Nama Role -->
                <div class="mb-4">
                    <label for="barang_name" class="block text-gray-700 text-sm font-bold mb-2">Nama Barang:</label>
                    <input type="text" id="barang_name" name="barang_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Nama Barang" required>
                </div>

                <!-- Role Deskripsi -->
                <div class="mb-4">
                    <label for="harga_barang" class="block text-gray-700 text-sm font-bold mb-2">Harga Barang:</label>
                    <textarea id="harga_barang" name="harga_barang" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Harga Barang" rows="3" required></textarea>
                    <!-- <input type="number" id="harga_barang" name="harga_barang" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Harga Barang" required> -->
                </div>

                <!-- Role Status -->
                <div class="mb-4">
                    <label for="jumlah_barang" class="block text-gray-700 text-sm font-bold mb-2">Quantity:</label>
                    <!-- <select id="role_status" name="role_status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value="">Pilih Status</option>
                        <option value=1>Active</option>
                        <option value=0>Inactive</option>
                    </select> -->
                    <input type="number" id="jumlah_barang" name="jumlah_barang" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Qty Barang" required>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>