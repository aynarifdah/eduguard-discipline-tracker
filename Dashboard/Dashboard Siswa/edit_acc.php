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

// Proses ubah password TANPA HASH
if (isset($_POST['ubah_password'])) {
    $password_baru = $_POST['password_baru'];

    if (!empty($password_baru)) {
        $update = mysqli_query($conn, "UPDATE siswa SET password = '$password_baru' WHERE nisn = '$nisn'");

        if ($update) {
            echo "<script>alert('Password berhasil diubah!'); window.location.href='sidebarsiswa.php';</script>";
            exit;
        } else {
            echo "<script>alert('Gagal mengubah password');</script>";
        }
    } else {
        echo "<script>alert('Password baru tidak boleh kosong');</script>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Akun Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            min-height: 100%;
        }

        body {
            background:rgb(244, 244, 244);
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 70vh;
            background-color: #b71c1c;
            z-index: -1;
        }

        .header {
            padding: 30px;
            color: white;
            text-align: center;
            border-radius: 0 0 20px 20px;
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

        label {
            font-weight: bold;
        }

        .content-wrapper {
            padding-bottom: 50px;
        }
    </style>
</head>
<body>


    <div class="header">
        <h2>Edit Akun - <?= htmlspecialchars($siswa['nama_siswa']); ?></h2>
    </div>

    <div class="container content-wrapper">
        <div class="row justify-content-center">

            <div class="col-md-6">
                <div class="card card-custom p-4">
                    <h4 class="mb-3">Informasi Akun</h4>
                    <p><strong>Nama:</strong> <?= htmlspecialchars($siswa['nama_siswa']); ?></p>
                    <p><strong>Username (NISN):</strong> <?= htmlspecialchars($siswa['nisn']); ?></p>
                    <p><strong>Password Saat Ini:</strong> <?= htmlspecialchars($siswa['password']); ?></p>
                    <hr>
                    <h5>Ubah Password</h5>
                    <form method="post">
                        <div class="mb-3">
                            <label>Password Baru</label>
                            <div class="input-group">
                                <input type="password" name="password_baru" id="password_baru" class="form-control" required>
                                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()" tabindex="-1">👁️</button>
                            </div>
                        </div>
                        <button type="submit" name="ubah_password" class="btn btn-merah">Simpan Perubahan</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script>
    function togglePassword() {
        const passwordInput = document.getElementById("password_baru");
        passwordInput.type = passwordInput.type === "password" ? "text" : "password";
    }
    </script>

</body>
</html>
