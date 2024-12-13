<?php
include("../controllers/BukuController.php");
$obj = new BukuController();
$msg = null;

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

if (isset($_POST["submitted"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $kodebuku = $_POST["kodebuku"];
    $judul = $_POST["judul"];
    $pengarang = $_POST["pengarang"];
    $penerbit = $_POST["penerbit"];
    $tahun = $_POST["tahun"];
    
    $dat = $obj->updateBuku($id, $kodebuku, $judul, $pengarang, $penerbit, $tahun);
    $msg = json_decode($dat, true);
}

$rows = $obj->getBuku($id);
?>

<html>
<head>
    <title>Edit Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-800 p-6">
    <div class="max-w-lg mx-auto bg-gray-900 p-6 rounded-lg shadow-md">
        <h1 class="text-4xl font-bold mb-2 text-center text-white">Edit Buku</h1>
        <p class="text-gray-400 mb-4 text-center">Edit Data Buku</p>

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
                    <label for="kodebuku" class="block text-sm font-medium text-gray-300">Kode Buku:</label>
                    <input type="text" id="kodebuku" name="kodebuku" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['kodebuku']; ?>" required />
                </div>
                <div class="mb-4">
                    <label for="judul" class="block text-sm font-medium text-gray-300">Judul:</label>
                    <input type="text" id="judul" name="judul" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['judul']; ?>" required />
                </div>
                <div class="mb-4">
                    <label for="pengarang" class="block text-sm font-medium text-gray-300">Pengarang:</label>
                    <input type="text" id="pengarang" name="pengarang" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['pengarang']; ?>" required />
                </div>
                <div class="mb-4">
                    <label for="penerbit" class="block text-sm font-medium text-gray-300">Penerbit:</label>
                    <input type="text" id="penerbit" name="penerbit" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['penerbit']; ?>" required />
                </div>
                <div class="mb-4">
                    <label for="tahun" class="block text-sm font-medium text-gray-300">Tahun:</label>
                    <input type="number" id="tahun" name="tahun" class="mt-1 block w-full border border-gray-600 bg-gray-800 text-white rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['tahun']; ?>" required />
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