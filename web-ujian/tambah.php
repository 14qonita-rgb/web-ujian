<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama_produk = $_POST['nama_produk'];
    $harga       = $_POST['harga'];

    // FITUR UPLOAD FILE
    $nama_file   = $_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $tmp_file    = $_FILES['gambar']['tmp_name'];
    $ekstensi    = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
    $ekstensi_valid = ['jpg', 'jpeg', 'png', 'webp'];

    // FITUR VALIDATION: Cek input kosong
    if (empty($nama_produk) || empty($harga) || empty($nama_file)) {
        echo "<script>alert('Semua field wajib diisi!');</script>";
    } 
    // VALIDASI: Cek format ekstensi gambar
    elseif (!in_array($ekstensi, $ekstensi_valid)) {
        echo "<script>alert('Format file harus JPG, JPEG, PNG, atau WEBP!');</script>";
    } 
    // VALIDASI: Cek ukuran file (maksimal 2MB)
    elseif ($ukuran_file > 2097152) {
        echo "<script>alert('Ukuran file terlalu besar! Maksimal 2MB.');</script>";
    } else {
        // Beri nama unik agar file tidak saling bentrok
        $nama_file_baru = uniqid() . '.' . $ekstensi;

        // Pindahkan file dari komputer ke folder 'uploads/'
        if (move_uploaded_file($tmp_file, "uploads/" . $nama_file_baru)) {
            
            // FITUR INSERT: Masukkan data ke database MySQL
            $query = "INSERT INTO produk (nama_produk, harga, gambar) VALUES ('$nama_produk', '$harga', '$nama_file_baru')";
            $sql   = mysqli_query($koneksi, $query);

            if ($sql) {
                echo "<script>alert('Data berhasil ditambahkan!'); window.location='index.php';</script>";
            } else {
                echo "<script>alert('Gagal menyimpan ke database.');</script>";
            }
        } else {
            echo "<script>alert('Gagal mengupload gambar!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f4f4f9; }
        .form-container { background: #fff; padding: 20px; border-radius: 5px; width: 400px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input { width: 100%; padding: 8px; margin: 8px 0 15px 0; box-sizing: border-box; }
        .btn { padding: 10px 15px; background: #28a745; color: #fff; border: none; border-radius: 5px; cursor: pointer; }
        .btn-kembali { background: #6c757d; text-decoration: none; padding: 10px 15px; color: white; border-radius: 5px; display: inline-block; margin-left: 10px; }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Form Tambah Produk</h2>
        <!-- PENTING: enctype="multipart/form-data" wajib ada agar file gambar bisa terkirim -->
        <form action="" method="POST" enctype="multipart/form-data">
            <label>Nama Produk:</label>
            <input type="text" name="nama_produk" required>

            <label>Harga (Rp):</label>
            <input type="number" name="harga" required>

            <label>Foto Produk:</label>
            <input type="file" name="gambar" required>

            <button type="submit" name="submit" class="btn">Simpan</button>
            <a href="index.php" class="btn-kembali">Kembali</a>
        </form>
    </div>

</body>
</html>