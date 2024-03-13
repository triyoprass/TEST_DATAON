<?php
session_start();

include_once 'koneksi.php'; // Menghubungkan ke file koneksi database

if (!isset($_SESSION['username'])) {
    header("Location: index.php"); // Jika pengguna belum login, arahkan kembali ke halaman login
    exit;
}

$username = $_SESSION['username'];

// Cek apakah parameter ID telah diberikan
if (!isset($_GET['id'])) {
    header("Location: distributor.php"); // Jika tidak, arahkan kembali ke halaman distributor
    exit;
}

$id = $_GET['id'];

// Query untuk mengambil data distributor berdasarkan ID
$query = "SELECT * FROM distributor WHERE id = $id";
$result = mysqli_query($conn, $query); // Perhatikan penggunaan $conn bukan $koneksi

// Periksa apakah kueri berhasil dieksekusi dan apakah ada data yang ditemukan
if (!$result || mysqli_num_rows($result) == 0) {
    echo "Data distributor tidak ditemukan.";
    exit;
}

$row = mysqli_fetch_assoc($result); // Ambil data distributor dari hasil kueri
?>

<?php include_once 'header.php'; ?>

<div class="container">
    <h2>Edit Distributor</h2>
    <form action="update_dist.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>">
        </div>
        <div class="form-group">
            <label for="kota">Kota:</label>
            <input type="text" class="form-control" id="kota" name="kota" value="<?php echo $row['kota']; ?>">
        </div>
        <div class="form-group">
            <label for="wilayah">Wilayah:</label>
            <input type="text" class="form-control" id="wilayah" name="wilayah" value="<?php echo $row['wilayah']; ?>">
        </div>
        <div class="form-group">
            <label for="country">Country:</label>
            <input type="text" class="form-control" id="country" name="country" value="<?php echo $row['country']; ?>">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['phone']; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<?php include_once 'footer.php'; ?>
