<?php
include("../controllers/BukuController.php");
$obj = new BukuController();
$msg = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodebuku = $_POST["kodebuku"];
    $judul = $_POST["judul"];
    $pengarang = $_POST["pengarang"];
    $penerbit = $_POST["penerbit"];
    $tahun = $_POST["tahun"];
    
    $dat = $obj->addBuku($kodebuku, $judul, $pengarang, $penerbit, $tahun);
    $msg = json_decode($dat, true);
}
?>
<html>
<head>
    <title>Tambah Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-800 p-6">
    <div class="max-w-lg mx-auto bg-gray-900 p-8 rounded-lg shadow-lg">
        <h1 class="text-4xl font-bold text-center text-white mb-4">Tambah Buku</h1>
        <p class="text-gray-400 text-center mb-6">Entry Data Buku</p>

        <?php 
        if (isset($msg)) { 
            if ($msg['success']) {
                echo '<div class="bg-green-500 text-white p-3 rounded mb-4 text-center">Insert Data Berhasil</div>';
                echo '<meta http-equiv="refresh" content="2;url=index.php">';
            } else {
                echo '<div class="bg-red-500 text-white p-3 rounded mb-4 text-center">Insert Gagal</div>'; 
            }
        }
        ?>

        <form name="formAdd" method="POST" action="">
            <div class="mb-4">
                <label for="kodebuku" class="block text-sm font-medium text-gray-300">Kode Buku:</label>
                <input type="text" id="kodebuku" name="kodebuku" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium text-gray-300">Judul:</label>
                <input type="text" id="judul" name="judul" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="pengarang" class="block text-sm font-medium text-gray-300">Pengarang:</label>
                <input type="text" id="pengarang" name="pengarang" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="penerbit" class="block text-sm font-medium text-gray-300">Penerbit:</label>
                <input type="text" id="penerbit" name="penerbit" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="tahun" class="block text-sm font-medium text-gray-300">Tahun:</label>
                <input type="number" id="tahun" name="tahun" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="flex justify-between">
                <button class="bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700" type="submit">Save</button>
                <a href="index.php" class="bg-gray-700 text-gray-300 font-semibold py-2 px-4 rounded hover:bg-gray-600">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>