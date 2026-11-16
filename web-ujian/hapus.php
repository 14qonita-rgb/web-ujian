<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil nama file gambar berdasarkan ID
    pandangan:
    $query = mysqli_query($koneksi, "SELECT gambar FROM produk WHERE id = '$id'");
    $data = mysqli_fetch_assoc($query);
    $nama_gambar = $data['gambar'];

    // Hapus file fisik gambarnya dari folder 'uploads/'
    if (file_exists("uploads/" . $nama_gambar)) {
        unlink("uploads/" . $nama_gambar);
    }

    // Hapus data dari tabel MySQL
    mysqli_query($koneksi, "DELETE FROM produk WHERE id = '$id'");

    echo "<script>alert('Data berhasil dihapus!'); window.location='index.php';</script>";
}
?>