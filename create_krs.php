<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uts5a";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $kelas = $_POST['kelas'];
    
    // Periksa apakah ada mata kuliah yang dipilih
    if(isset($_POST['makul']) && is_array($_POST['makul'])) {
        $mata_kuliah_pilihan = implode(", ", $_POST['makul']);
    } else {
        $mata_kuliah_pilihan = ""; // Jika tidak ada yang dipilih, set sebagai string kosong
    }

    $sql = "INSERT INTO krs (nama, nim, kelas, mata_kuliah_pilihan) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nama, $nim, $kelas, $mata_kuliah_pilihan);
    
    if ($stmt->execute()) {
        echo '<p class="success-message">Data KRS berhasil disimpan</p>';
        echo '<br><br><a href="form_buat_krs.html" class="btn btn-secondary">Kembali ke Form</a>';
    } else {
        echo '<p class="error-message">Error: ' . $stmt->error . '</p>';
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form KRS</title>
    <!-- Tambahkan link ke file CSS di sini -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Bagian konten HTML lainnya di sini -->
</body>
</html>
