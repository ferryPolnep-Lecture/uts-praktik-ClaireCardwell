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

$sql = "SELECT * FROM krs";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data KRS</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .btn-edit, .btn-delete {
            text-decoration: none;
            padding: 5px 10px;
            color: white;
            border-radius: 5px;
        }
        .btn-edit {
            background-color: #28a745;
        }
        .btn-delete {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data KRS</h2>
        <?php
        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Kelas</th>
                        <th>Mata Kuliah Pilihan</th>
                        <th>Aksi</th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["nama"]."</td>
                        <td>".$row["nim"]."</td>
                        <td>".$row["kelas"]."</td>
                        <td>".$row["mata_kuliah_pilihan"]."</td>
                        <td>
                            <a href='edit_krs.php?id=".$row["id"]."' class='btn-edit'>Edit</a>
                            <a href='delete_krs.php?id=".$row["id"]."' class='btn-delete' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\");'>Hapus</a>
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
        <br>
        <a href="form_buat_krs.html" class="btn btn-secondary">Kembali ke Form</a>
     
       <!-- //Style untuk button, di css ndak mau keluar//*   -->
       
       <style>
    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        text-align: center;
        border-radius: 5px;
        text-decoration: none;
        font-size: 16px;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn:hover {
        background-color: #45a049;
        transform: scale(1.05); /* Sedikit memperbesar saat di-hover */
    }

    .btn:active {
        background-color: #3e8e41; /* Warna ketika tombol ditekan */
        transform: scale(1); /* Kembali ke ukuran semula */
    }
</style>
    </div>
</body>
</html>
