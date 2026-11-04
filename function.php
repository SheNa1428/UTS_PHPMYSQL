
<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "sweet eid");

// cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// menampilkan data
function query_db($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];

    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }

    return $rows;
}

// upload gambar
function upload_gambar($nama){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if($error === 4){
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
              </script>";
        return false;
    }

    // cek ekstensi gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

    if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "<script>
                alert('File yang diupload bukan gambar!');
              </script>";
        return false;
    }

    // cek ukuran gambar
    if($ukuranFile > 2000000){
        echo "<script>
                alert('Ukuran gambar terlalu besar!');
              </script>";
        return false;
    }

    // buat nama file baru
    $namaFileBaru = uniqid() . '_' . preg_replace('/[^a-zA-Z0-9_-]/', '_', $nama) . '.' . $ekstensiGambar;

    // pindahkan gambar ke folder img
    if(!move_uploaded_file($tmpName, 'img/' . $namaFileBaru)){
        echo "<script>
                alert('Gambar gagal diupload!');
              </script>";
        return false;
    }

    return $namaFileBaru;
}

// tambah data
function tambah_data($data){
    global $conn;

    $nama = $data["nama"];
    $kategori = $data["kategori"];
    $harga = $data["harga"];
    $kemasan = $data["kemasan"];
    $deskripsi = $data["deskripsi"];
    // $gambar = $data["gambar"];

    // upload gambar
    $gambar = upload_gambar($nama);
    if(!$gambar){
        return false;
    }

    $query = "INSERT INTO produk(nama, kategori, harga, kemasan, deskripsi, gambar)
              VALUES('$nama', '$kategori', '$harga', '$kemasan', '$deskripsi', '$gambar')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// hapus data
function hapus_data($id){
    global $conn;

    $query = "DELETE FROM produk WHERE id = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// edit data
function edit_data($data){
    global $conn;

    $id = $data["id"];
    $nama = $data["nama"];
    $kategori = $data["kategori"];
    $harga = $data["harga"];
    $kemasan = $data["kemasan"];
    $deskripsi = $data["deskripsi"];

    // ambil data gambar lama
    $gambarLama = $data["gambarLama"];

    // cek apakah pengguna memilih gambar baru
    if($_FILES['gambar']['error'] === 4){
        $gambar = $gambarLama;
    } else {
        $gambar = upload_gambar($nama);

        if(!$gambar){
            return false;
        }
    }

    $query = "UPDATE produk SET
                nama = '$nama',
                kategori = '$kategori',
                harga = '$harga',
                kemasan = '$kemasan',
                deskripsi = '$deskripsi',
                gambar = '$gambar'
                WHERE id = '$id'";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// search
function cari_data($keyword) {
    global $conn;

    $keyword = mysqli_real_escape_string($conn, $keyword);

    $query = "SELECT * FROM produk
              WHERE
              nama LIKE '%$keyword%' OR
              kategori LIKE '%$keyword%' OR
              harga LIKE '%$keyword%' OR
              kemasan LIKE '%$keyword%' OR
              deskripsi LIKE '%$keyword%'";

    return query_db($query);
}

// registrasi admin
function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $konfirmasi_password = $data["konfirmasi_password"];

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)){
        echo "<script>
                alert('Username sudah terdaftar!');
              </script>";
        return false;
    }

    // cek konfirmasi password
    if($password !== $konfirmasi_password){
        echo "<script>
                alert('Konfirmasi password tidak sesuai!');
              </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // masukkan data ke tabel admin
    mysqli_query($conn, "INSERT INTO admin (username, password)
                         VALUES ('$username', '$password')");

    return mysqli_affected_rows($conn);
}
?>
