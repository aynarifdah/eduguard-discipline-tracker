<?php
    session_start();
    include '../../connection.php'; // Pastikan path sesuai dengan sistemmu
    
    // Cek apakah admin atau guru sudah login
    if (!isset($_SESSION['nisn'])) {
        echo '<script>alert("Anda Belum Login"); window.location="../../login.php";</script>';
        exit;
    }

    
    // Ambil data laporan yang masih dalam status 'proses' dari tabel verifikasi
    $query = $conn->query("SELECT * FROM verifikasi WHERE status_verifikasi = 'proses'");
    
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css-js/sidebar.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <aside class="col-md-3 col-lg-2 sidebar">
                <div class="text-center">
                    <img src="../img/logomerah.png" class="mb-4 rounded" alt="logo">
                </div>
                <h3 class="mb-5 text-center">EduGuard</h3>

                <nav>
                    <a href="dashboard.php" class="nav-link active"><i class="fa-solid fa-house"></i> Dashboard</a>
                    <a href="riwayat.php" class="nav-link"><i class="fa-solid fa-list"></i> Riwayat Pelanggaran</a>
                    <a href="notifikasi.php" class="nav-link"><i class="fa-solid fa-bell"></i> Notifikasi</a>
                    <a href="../../logout.php" style="text-decoration: none  
                    ;"><i class="fa-solid fa-sign-out-alt"></i> Logout</a>
                </nav>
            </aside>

            <!-- Konten Utama -->
            <main class="col-md-9 col-lg-10 main-content" id="main-content">
              <!-- Konten akan dimuat secara dinamis di sini -->
            </main>
           </div>
           

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../css-js/script.js"></script>

    
</body>
</html>
