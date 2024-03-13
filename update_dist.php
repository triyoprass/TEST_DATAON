<?php
session_start();

include_once 'koneksi.php'; // Menghubungkan ke file koneksi database

if (!isset($_SESSION['username'])) {
    header("Location: index.php"); // Jika pengguna belum login, arahkan kembali ke halaman login
    exit;
}

// Periksa apakah data yang diperlukan telah diberikan
if (!isset($_POST['id']) || !isset($_POST['nama']) || !isset($_POST['kota'])) {
    echo "Data yang diperlukan tidak lengkap.";
    exit;
}

$id = $_POST['id'];
$nama = $_POST['nama'];
$kota = $_POST['kota'];

// Query untuk melakukan pembaruan data distributor
$query = "UPDATE distributor SET nama = '$nama', kota = '$kota' WHERE id = $id";

// Lakukan pembaruan data
$result = mysqli_query($conn, $query); // Perhatikan penggunaan $conn bukan $koneksi

// Periksa apakah pembaruan berhasil atau gagal
if ($result) {
    // Redirect kembali ke halaman distributor jika pembaruan berhasil
    header("Location: distributor.php");
    exit;
} else {
    // Tampilkan pesan kesalahan jika pembaruan gagal
    echo "Pembaruan data distributor gagal: " . mysqli_error($conn); // Perhatikan penggunaan $conn bukan $koneksi
}

mysqli_close($conn); // Perhatikan penggunaan $conn bukan $koneksi
?>
