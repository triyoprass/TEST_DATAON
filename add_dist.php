<?php
session_start();

include_once 'koneksi.php'; // Menghubungkan ke file koneksi database

if(!isset($_SESSION['username'])) {
    header("Location: index.php"); // Jika pengguna belum login, arahkan kembali ke halaman login
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai form dan lakukan sanitasi
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $kota = mysqli_real_escape_string($conn, $_POST['kota']);
    $wilayah = mysqli_real_escape_string($conn, $_POST['wilayah']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Query untuk menyimpan data distributor baru
    $query = "INSERT INTO distributor (nama, kota, wilayah, country, phone, email) VALUES ('$nama', '$kota', '$wilayah', '$country', '$phone', '$email')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect kembali ke halaman distributor setelah berhasil menambahkan distributor
        header("Location: distributor.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<?php include_once 'header.php'; ?>

<div class="container">
    <h2>Tambah Distributor</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="kota">Kota:</label>
            <input type="text" class="form-control" id="kota" name="kota" required>
        </div>
        <div class="form-group">
            <label for="wilayah">Wilayah:</label>
            <input type="text" class="form-control" id="wilayah" name="wilayah">
        </div>
        <div class="form-group">
            <label for="country">Country:</label>
            <input type="text" class="form-control" id="country" name="country">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>
        <button type="submit" class="btn btn-primary">Tambah Distributor</button>
    </form>
</div>

<?php include_once 'footer.php'; ?>
