<?php
include("../controllers/JadwalController.php");
$obj = new JadwalController();
$msg = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodemk = $_POST["kodemk"];
    $matakuliah = $_POST["matakuliah"];
    $kelas = $_POST["kelas"];
    $hari = $_POST["hari"];
    $waktu = $_POST["waktu"];
    $ruangan = $_POST["ruangan"];
    $dosen = $_POST["dosen"];
    
    $dat = $obj->addJadwal($kodemk, $matakuliah, $kelas, $hari, $waktu, $ruangan, $dosen);
    $msg = json_decode($dat, true);
}
?>
<html>
<head>
    <title>Tambah Jadwal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-800 p-6">
    <div class="max-w-lg mx-auto bg-gray-900 p-8 rounded-lg shadow-lg">
        <h1 class="text-4xl font-bold text-center text-white mb-4">Tambah Jadwal</h1>
        <p class="text-gray-400 text-center mb-6">Entry Data Jadwal</p>

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
                <label for="kodemk" class="block text-sm font-medium text-gray-300">Kode MK:</label>
                <input type="text" id="kodemk" name="kodemk" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="matakuliah" class="block text-sm font-medium text-gray-300">Mata Kuliah:</label>
                <input type="text" id="matakuliah" name="matakuliah" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="kelas" class="block text-sm font-medium text-gray-300">Kelas:</label>
                <input type="text" id="kelas" name="kelas" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="hari" class="block text-sm font-medium text-gray-300">Hari:</label>
                <input type="text" id="hari" name="hari" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="waktu" class="block text-sm font-medium text-gray-300">Waktu:</label>
                <input type="time" id="waktu" name="waktu" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="ruangan" class="block text-sm font-medium text-gray-300">Ruangan:</label>
                <input type="text" id="ruangan" name="ruangan" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="dosen" class="block text-sm font-medium text-gray-300">Dosen:</label>
                <input type="text" id="dosen" name="dosen" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="flex justify-between">
                <button class="bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700" type="submit">Save</button>
                <a href="index.php" class="bg-gray-700 text-gray-300 font-semibold py-2 px-4 rounded hover:bg-gray-600">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>