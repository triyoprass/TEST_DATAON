<?php
session_start(); // Mulai sesi

if(isset($_SESSION['username'])) {
    // Jika pengguna sudah login, arahkan ke halaman selanjutnya
    header("Location: home.php");
    exit;
}

include_once 'koneksi.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lindungi dari SQL Injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Query untuk mencari pengguna dengan username dan password yang sesuai
    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if($result->num_rows == 1) {
        // Jika login berhasil, buat sesi dan arahkan ke halaman selanjutnya
        $_SESSION['username'] = $username;
        header("location: home.php");
        exit;
    } else {
        // Jika login gagal, tampilkan pesan error
        $error = "Username atau password salah";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
</head>
<body>
<img src="image/kopi.png" width="10%" height="10%">
<div class="content">
<h1 class="coffee-valley"><i> Coffe Valley </i></h1>
        <h3>
            taste the love in every cup<br>
            one Alewife Center 3rd floor<br>
            Cambride, MA 02140
        </h3>
    </div>
    <?php if(isset($error)) { ?>
        <div><?php echo $error; ?></div>
    <?php } ?>
    <form method="post" action="">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>
