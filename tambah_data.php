<?php

require 'function.php';

if (isset($_POST["submit"])) {

    if (tambah_data($_POST) > 0) {
        echo "
            <script>
                alert('Data produk berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data produk gagal ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    }

}

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Tambah Data Produk</title>
    <link rel="stylesheet" href="./style.css?v=10">
</head>


<body class="page-form">


<div class="container">


    <div class="form-card">


        <h3>Tambah Data Produk</h3>


        <form action="" method="post" enctype="multipart/form-data">


                    <div class="form-group">
                <label for="nama">Nama Produk</label>
                <input type="text" name="nama" placeholder="Masukkan nama produk">
            </div>

            <div class="form-group">
                <label for="kategori">Kategori</label>
                <input type="text" name="kategori" placeholder="Masukkan kategori kue">
            </div>

            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" name="harga" placeholder="Masukkan harga produk">
            </div>

            <div class="form-group">
                <label for="kemasan">Kemasan</label>
                <input type="text" name="kemasan" placeholder="Contoh: Toples 500 gram">
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" placeholder="Masukkan deskripsi produk"></textarea>
            </div>

            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar">
            </div>

            <div class="button-group">
                <button type="submit" name="submit" class="btn btn-tambah"> Tambah Data </button>
                <a href="index.php" class="btn btn-kembali"> Kembali </a>
            </div>


        </form>


    </div>


</div>


</body>
</html>