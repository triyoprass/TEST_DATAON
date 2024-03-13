<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: index.php"); // Jika pengguna belum login, arahkan kembali ke halaman login
    exit;
}

$username = $_SESSION['username'];
?>

<?php include_once 'header.php'; ?>

<h3>Bean Of The Day</h3>
<p>cubita</p>

<h3>Sale Price</h3>
<p>$11.00</p>

<h3>Description</h3>
<p>cubita coffe is sun dried and hand sorted. it Originates from an elevation of ever 2000 meters in the andes mountain of ecuador.
    <br> which is located closest to the sun on the equator aroma  and rich flavor
</p>
<?php include_once 'footer.php'; ?>
