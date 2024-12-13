<?php
include("../controllers/BarangController.php");
$obj = new BarangController();
$rows = $obj->getBarangList();
?>
<html>
<head>
    <title>Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-800 p-6">
    <div class="max-w-6xl mx-auto bg-gray-900 p-6 rounded-lg shadow-md">
        <h1 class="text-4xl font-bold mb-2 text-center text-white">Daftar Barang</h1>
        <p class="text-gray-400 mb-4 text-center">List All Data Barang</p>
        <a style="margin:10px 0px;" class="bg-blue-600 text-white px-4 py-2 rounded mr-2" href="add.php"><i class="fas fa-plus"></i> Tambah Barang</a>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-800 border border-gray-700">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b text-gray-300">ID</th>
                        <th class="py-2 px-4 border-b text-gray-300">Kode Barang</th>
                        <th class="py-2 px-4 border-b text-gray-300">Nama Barang</th>
                        <th class="py-2 px-4 border-b text-gray-300">Kategori</th>
                        <th class="py-2 px-4 border-b text-gray-300">Harga</th>
                        <th class="py-2 px-4 border-b text-gray-300">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($rows as $row){ ?>
                    <tr class="bg-gray-700 hover:bg-gray-600">
                        <td class="py-2 px-4 border-b text-gray-300"><?php echo $row['id']; ?></td>
                        <td class="py-2 px-4 border-b text-gray-300"><?php echo $row['kodebrg']; ?></td>
                        <td class="py-2 px-4 border-b text-gray-300"><?php echo $row['namabrg']; ?></td>
                        <td class="py-2 px-4 border-b text-gray-300"><?php echo $row['kategori']; ?></td>
                        <td class="py-2 px-4 border-b text-gray-300"><?php echo number_format($row['harga'], 2); ?></td>
                        <td class="py-2 px-4 border-b">
                            <a class="bg-blue-600 text-white px-2 py-1 rounded mr-2" href="edit.php?id=<?php echo $row['id']; ?>"><i class="fas fa-pen"></i></a>
                            <a class="bg-red-600 text-white px-2 py-1 rounded" href="delete.php?id=<?php echo $row['id']; ?>"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>