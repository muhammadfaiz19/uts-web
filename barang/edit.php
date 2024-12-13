<?php
include("../controllers/BarangController.php");
$obj = new BarangController();
$msg = null;

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

if (isset($_POST["submitted"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $kodebrg = $_POST["kodebrg"];
    $namabrg = $_POST["namabrg"];
    $kategori = $_POST["kategori"];
    $harga = $_POST["harga"];
    
    $dat = $obj->updateBarang($id, $kodebrg, $namabrg, $kategori, $harga);
    $msg = json_decode($dat, true);
}

$rows = $obj->getBarang($id);
?>

<html>
<head>
    <title>Edit Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</ ```php
</head>
<body class="bg-gray-800 p-6">
    <div class="max-w-lg mx-auto bg-gray-900 p-6 rounded-lg shadow-md">
        <h1 class="text-4xl font-bold mb-2 text-center text-white">Edit Barang</h1>
        <p class="text-gray-400 mb-4 text-center">Edit Data Barang</p>

        <?php 
        if (isset($msg)) { 
            if ($msg['success']) {
                echo '<div class="bg-green-500 text-white p-3 rounded mb-4 text-center">Update Data Berhasil</div>';
                echo '<meta http-equiv="refresh" content="2;url=index.php">';
            } else {
                echo '<div class="bg-red-500 text-white p-3 rounded mb-4 text-center">Update Gagal</div>'; 
            }
        }
        ?>

        <form name="formEdit" method="POST" action="">
            <input type="hidden" name="submitted" value="1"/>
            <?php foreach ($rows as $row): ?>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                <div class="mb-4">
                    <label for="kodebrg" class="block text-sm font-medium text-gray-300">Kode Barang:</label>
                    <input type="text" id="kodebrg" name="kodebrg" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['kodebrg']; ?>" required />
                </div>
                <div class="mb-4">
                    <label for="namabrg" class="block text-sm font-medium text-gray-300">Nama Barang:</label>
                    <input type="text" id="namabrg" name="namabrg" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['namabrg']; ?>" required />
                </div>
                <div class="mb-4">
                    <label for="kategori" class="block text-sm font-medium text-gray-300">Kategori:</label>
                    <input type="text" id="kategori" name="kategori" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['kategori']; ?>" required />
                </div>
                <div class="mb-4">
                    <label for="harga" class="block text-sm font-medium text-gray-300">Harga:</label>
                    <input type="number" id="harga" name="harga" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['harga']; ?>" required />
                </div>
            <?php endforeach; ?>
            <div class="flex justify-between">
                <button class="bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700" type="submit">Save</button>
                <a href="index.php" class="bg-gray-700 text-gray-300 font-semibold py-2 px-4 rounded hover:bg-gray-600">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>