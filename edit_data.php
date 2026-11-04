<?php
session_start();

// if( !isset($_SESSION['session_login']) ){
//     header('location: login.php');
//     exit;
// }

    require 'function.php';

//     if (!isset($_GET['id'])) {
//         header("Location: index.php");
//         exit;
//     }

    $id = $_GET['id']; 

    $produk = query_db("SELECT * FROM produk WHERE id = $id")[0];

    if(isset($_POST["submit"])){

        $_POST["gambarLama"] = $produk["gambar"];

        if (edit_data($_POST) > 0){
            echo "<script>
            alert('data berhasil diubah');
            document.location.href = 'index.php';
            </script>";
        }else{
         echo "<script>
         alert('data gagal diubah');
         </script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Data Produk Sweet Eid</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="page-form">

<div class="container">

    <div class="form-card">

        <h3>Edit Data Produk Sweet Eid</h3>

        <form action="" method="post" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?php echo $produk["id"];?>">
        <input type="hidden" name="gambarLama" value="<?php echo $produk["gambar"];?>">

            <div class="form-group">
                <label for="nama">Nama Produk</label>
                <input type="text" name="nama" value="<?php echo $produk["nama"];?>">
            </div>

            <div class="form-group">
                <label for="kategori">Kategori</label>
                <input type="text" name="kategori" value="<?php echo $produk["kategori"];?>">
            </div>

            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" name="harga" value="<?php echo $produk["harga"];?>">
            </div>

            <div class="form-group">
                <label for="kemasan">Kemasan</label>
                <input type="text" name="kemasan" value="<?php echo $produk["kemasan"];?>">
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi"><?php echo $produk["deskripsi"];?></textarea>
            </div>

            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar">
                <br>
                <img src="img/<?php echo $produk["gambar"]; ?>" alt="" width="200" height="200">
            </div>

            <div class="button-group">
                <button type="submit" name="submit" class="btn btn-tambah"> Edit Data </button>
                <a href="index.php" class="btn btn-kembali"> Kembali </a>
            </div>

        </form>

    </div>

</div>

</body>
</html>