<?php
session_start();

include_once 'koneksi.php'; // Menghubungkan ke file koneksi database

if (!isset($_SESSION['username'])) {
    header("Location: index.php"); // Jika pengguna belum login, arahkan kembali ke halaman login
    exit;
}

$username = $_SESSION['username'];

// Query untuk mengambil data dari tabel distributor
$query = "SELECT * FROM distributor";
$result = mysqli_query($conn, $query); // Perhatikan penggunaan $conn bukan $koneksi

// Periksa apakah kueri berhasil dieksekusi
if (!$result) {
    die("Query failed: " . mysqli_error($conn)); // Perhatikan penggunaan $conn bukan $koneksi
}

?>

<?php include_once 'header.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 25%;">Distributor</th>
                        <th style="width: 50%;">City</th>
                        <th style="width: 25%;">Action</th> <!-- Kolom baru untuk tombol edit -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) { // Periksa apakah ada baris yang dikembalikan
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Periksa apakah data pernah diedit
                            $lastEditTimestamp = strtotime($row['last_edit_timestamp']);
                            $currentTimestamp = time();
                            $timeDifference = $currentTimestamp - $lastEditTimestamp;

                            // Atur warna tombol edit berdasarkan kondisi
                            $editButtonColor = ($timeDifference > 0) ? 'bluewhite' : 'red';

                            // Kelola tambahan CSS untuk warna tombol
                            $additionalCSS = "style='color: $editButtonColor;'";

                    ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $row['nama']; ?></td>
                                <td style="text-align: center;"><?php echo $row['kota']; ?></td>
                                <td style="text-align: center;"><a href="edit_dist.php?id=<?php echo $row['id']; ?>" <?php echo $additionalCSS; ?>>Edit</a></td> <!-- Tautan untuk tombol edit -->
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='3'>No records found</td></tr>"; // Tampilkan pesan jika tidak ada data
                    }
                    ?>
                </tbody>
            </table>
            <br>
            <div class="text-center">
                <a href="add_dist.php" class="btn btn-primary">Add</a>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>
