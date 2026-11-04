
<?php
session_start();

if( !isset($_SESSION['session_login']) ){
    header('location: login.php');
    exit;
}

require 'function.php';

// PAGINATION
$jumlahDataPerHalaman = 5;

 //hitung jumlah seluruh data
$jumlahData = count(query_db("SELECT * FROM produk"));

//menghitung jumlah halaman
$JumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

//halaman aktif
$halamanAktif = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;

//menentukan awal data
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

//ambil data produk berdasarkan pagination
$produk = query_db(
    "SELECT * FROM produk LIMIT $awalData, $jumlahDataPerHalaman");

//untuk mencari data melalui input, cari produk. . . .
if(isset($_POST["cari"])){
    $keyword = $_POST["produk"];
    $produk = cari_data("$keyword");
} else {
    $produk = query_db("SELECT * FROM produk LIMIT $awalData, $jumlahDataPerHalaman");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk Sweet Eid</title>
    <!-- CSS Sweet Eid -->
    <link rel="stylesheet" href="style.css?v=20261104">
</head>
<body class="page-index">
   <div class="container">
        <h2 style="text-align: center">Selamat Datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>

        <a href="logout.php" class="btn btn-logout">Logout</a>

        <h3 style="text-align: center">Daftar Produk Kue Sweet Eid</h3>

        <div class="top-bar">
            <!-- Searching -->
            <form action="" method="post" class="search-box">
                <input type="text" name="produk" placeholder="Cari produk...">
                <button type="submit" name="cari" class="btn btn-cari">Cari</button>
            </form>

            <!-- Tambah Data -->
            <a href="tambah_data.php" class="btn btn-tambah">+ Tambah Produk</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Kemasan</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor=1; ?>
                <?php foreach($produk as $data): ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $data["id"]; ?></td>
                    <td><?php echo $data["nama"]; ?></td>
                    <td><?php echo $data["kategori"]; ?></td>
                    <td>Rp <?php echo number_format($data["harga"], 0, ',', '.'); ?></td>
                    <td><?php echo $data["kemasan"]; ?></td>
                    <td><?php echo $data["deskripsi"]; ?></td>
                    <td>
                        <img src="img/<?php echo $data["gambar"]; ?>" alt="" width="90" height="90">
                    </td>
                    <td>
                        <a href="edit_data.php?id=<?php echo $data["id"]; ?>" class="btn btn-edit">Edit</a>
                        <a href="hapus_data.php?id=<?php echo $data["id"]; ?>" class="btn btn-hapus">Hapus</a>
                    </td>
                </tr>
                <?php $nomor++ ?>
                <?php endforeach ?>
            </tbody>
        </table>
        <br>
<br>

<!-- ======================================== -->
<!-- =============== PAGINATION ============== -->
<!-- ======================================== -->

<div class="pagination-wrapper">
    <div class="pagination">

        <!-- PREVIOUS -->
        <?php if($halamanAktif > 1): ?>
            <a href="?halaman=<?php echo $halamanAktif - 1; ?>" class="prev">
                &larr; prev
            </a>
        <?php else: ?>
            <span class="pagination-disabled">&larr; prev</span>
        <?php endif; ?>

        <!-- NOMOR HALAMAN -->
        <?php for($i = 1; $i <= $JumlahHalaman; $i++ ): ?>
            <?php if($i == $halamanAktif): ?>
                <a href="?halaman=<?php echo $i; ?>" class="active">
                    <?php echo $i; ?>
                </a>
            <?php else: ?>
                <a href="?halaman=<?php echo $i; ?>">
                    <?php echo $i; ?>
                </a>
            <?php endif; ?>
        <?php endfor; ?>

        <!-- NEXT -->
        <?php if($halamanAktif < $JumlahHalaman): ?>
            <a href="?halaman=<?php echo $halamanAktif + 1; ?>" class="next">
                Next &rarr;
            </a>
        <?php else: ?>
            <span class="pagination-disabled">
                Next &rarr;
            </span>
        <?php endif; ?>

    </div>
</div>

</div>
   </div>
</body>
</html>
