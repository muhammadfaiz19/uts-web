<?php
include("../controllers/BukuController.php");
$obj = new BukuController();
$rows = $obj->getBukuList();
?>
<html>
<head>
    <title>Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-800 p-6">
    <div class="max-w-6xl mx-auto bg-gray-900 p-6 rounded-lg shadow-md">
        <h1 class="text-4xl font-bold mb-2 text-center text-white">Daftar Buku</h1>
        <p class="text-gray-400 mb-4 text-center">List All Data Buku</p>
        <a style="margin:10px 0px;" class="bg-blue-600 text-white px-4 py-2 rounded mr-2" href="add.php"><i class="fas fa-plus"></i> Tambah Buku</a>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-gray-800 border border-gray-700">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b text-gray-300">ID</th>
                        <th class="py-2 px-4 border-b text-gray-300">Kode Buku</th>
                        <th class="py-2 px-4 border-b text-gray-300">Judul</th>
                        <th class="py-2 px-4 border-b text-gray-300">Pengarang</th>
                        <th class="py-2 px-4 border-b text-gray-300">Penerbit</th>
                        <th class="py-2 px-4 border-b text-gray-300">Tahun</th>
                        <th class="py-2 px-4 border-b text-gray-300">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($rows as $row){ ?>
                    <tr class="bg-gray-700 hover:bg-gray-600">
                        <td class="py-2 px-4 border-b text-gray-300"><?php echo $row['id']; ?></td>
                        <td class="py-2 px-4 border-b text-gray-300"><?php echo $row['kodebuku']; ?></td>
                        <td class="py-2 px-4 border-b text-gray-300"><?php echo $row['judul']; ?></td>
                        <td class="py-2 px-4 border-b text-gray-300"><?php echo $row['pengarang']; ?></td>
                        <td class="py-2 px-4 border-b text-gray-300"><?php echo $row['penerbit']; ?></td>
                        <td class="py-2 px-4 border-b text-gray-300"><?php echo $row['tahun']; ?></td>
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