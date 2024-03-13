<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: index.php"); // Jika pengguna belum login, arahkan kembali ke halaman login
    exit;
}

$username = $_SESSION['username'];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["document"])) {
    // Proses pengunggahan dokumen disini

    $title = $_POST['title'];
    $author = $_POST['author'];

    // Informasi tentang file
    $file_name = $_FILES["document"]["name"];
    $file_tmp = $_FILES["document"]["tmp_name"];
    $file_type = $_FILES["document"]["type"];
    $file_size = $_FILES["document"]["size"];
    
    // Periksa ukuran file (maksimal 5MB)
    $max_file_size = 5 * 1024 * 1024; // 5MB
    if ($file_size > $max_file_size) {
        echo "Error: File terlalu besar. Maksimal 5MB.";
        exit;
    }
    
    // Izinkan beberapa format file tertentu
    $allowed_types = array('pdf', 'doc', 'docx', 'txt');
    $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
    if (!in_array($file_extension, $allowed_types)) {
        echo "Error: Format file tidak didukung. Hanya PDF, DOC, DOCX, dan TXT yang diperbolehkan.";
        exit;
    }
    
    // Hasilkan nama file unik untuk mencegah penimpaan file yang sudah ada
    $unique_file_name = uniqid() . '_' . $file_name;
    
    // Pindahkan file yang diunggah ke direktori target
    $target_dir = "uploads/";
    $target_path = $target_dir . $unique_file_name;
    
    if (move_uploaded_file($file_tmp, $target_path)) {
        
        echo "Dokumen berhasil diunggah.";
    } else {
        echo "Error: Terjadi kesalahan saat mengunggah dokumen.";
    }
}
?>

<?php include_once 'header.php'; ?>

<h2>Upload Dokumen</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <div>
        <label for="title">Tittle:</label>
        <input type="text" id="title" name="title">
    </div>
    <div>
        <label for="document">Dokumen:</label>
        <input type="file" name="document" id="document">
    </div>
    <div>
        <label for="author">Author:</label>
        <input type="text" id="author" name="author">
    </div>
    <div>
        <input type="submit" value="Unggah Dokumen" name="submit">
    </div>
</form>

<?php include_once 'footer.php'; ?>
