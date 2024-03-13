<?php
session_start(); // Mulai sesi

// Hapus semua variabel sesi
$_SESSION = array();

// Hapus sesi dari penyimpanan
session_destroy();

// Arahkan kembali ke halaman login
header("Location: index.php");
exit;
?>
