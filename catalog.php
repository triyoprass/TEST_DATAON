<?php
// Sertakan file koneksi ke database
include "koneksi.php";

// Lakukan kueri ke database
$query = "SELECT * FROM catalog";
$result = mysqli_query($conn, $query); // Perhatikan penggunaan $conn bukan $koneksi

// Periksa apakah kueri berhasil atau tidak
if (!$result) {
    die("Query failed: " . mysqli_error($conn)); // Perhatikan penggunaan $conn bukan $koneksi
}
?>

<?php include_once 'header.php'; ?>

<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width: 25%;">Bean</th>
                <th style="width: 50%;">Description</th>
                <th style="width: 25%;">Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Lakukan iterasi pada hasil kueri dan tampilkan datanya
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td style="text-align: center;"><?php echo $row['bean']; ?></td>
                    <td style="text-align: center;"><?php echo $row['deskripsi']; ?></td>
                    <td style="text-align: center;"><?php echo $row['harga']; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php include_once 'footer.php'; ?>
