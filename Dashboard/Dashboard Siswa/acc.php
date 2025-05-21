<?php
session_start();
include '../../connection.php';

if (!isset($_SESSION['nisn'])) {
    echo "<script>alert('Silakan login terlebih dahulu'); window.location.href='../login.php';</script>";
    exit;
}

$nisn = $_SESSION['nisn'];
$query = mysqli_query($conn, "SELECT * FROM siswa WHERE nisn = '$nisn'");
$siswa = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Akun Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            background: linear-gradient(to bottom, #b71c1c 70%, white 30%);
            min-height: 100vh;
        }

        .header {
            padding: 30px;
            color: white;
            text-align: center;
            margin-bottom: 30px;
        }

        .card-custom {
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0,0,0,0.2);
            background-color: white;
        }

        .btn-merah {
            background-color: #b71c1c;
            color: white;
        }

        .btn-merah:hover {
            background-color: #9e1a1a;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Informasi Akun</h2>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-custom p-4">
                    <p><strong>Nama:</strong> <?= $siswa['nama_siswa']; ?></p>
                    <p><strong>Username (NISN):</strong> <?= $siswa['nisn']; ?></p>
                    <p><strong>Password Saat Ini:</strong> <?= $siswa['password']; ?></p>

                    <a href="edit_acc.php" class="btn btn-merah mt-3">Edit Akun</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
