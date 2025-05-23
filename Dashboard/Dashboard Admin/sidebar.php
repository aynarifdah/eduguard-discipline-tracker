<?php
    session_start();
    include '../../connection.php'; 
   
    if (!isset($_SESSION['username'])) {
    header("Location: ../../login.php"); 
    exit();
}

$query = "SELECT v.id_catatan, s.nama_siswa, p.jenis_pelanggaran, v.tgl_pelanggaran, v.status_verifikasi
          FROM verifikasi v
          JOIN siswa s ON v.id_siswa = s.id_siswa
          JOIN pelanggaran p ON v.id_pelanggaran = p.id_pelanggaran
          WHERE v.status_verifikasi = 'belum diverifikasi'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link rel="website icon" type="png" href="../img/logomerah.png">
  <link href="../css-js/sidebar.css" rel="stylesheet">
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
          <a href="dashboard.php" class="nav-link "><i class="fa-solid fa-house"></i> Dashboard</a>
          <a href="../../data_siswa.php" class="nav-link "><i class="fa-solid fa-users"></i> Data Siswa</a>
          <a href="Laporan.php" class="nav-link"><i class="fa-solid fa-envelope"></i> Laporan Pelanggaran</a>
          <a href="table_verifikasi.php" class="nav-link">
            <i class="fa-solid fa-chart-bar"></i> Verifikasi 
          </a>
          <a href="#" style="text-decoration: none;" onclick="logout()">
            <i class="fa-solid fa-sign-out-alt"></i> Logout
          </a>
          <script>
            function logout() {
              if (confirm("Yakin mau keluar?")) {
                window.location.href = "../../logout.php";
              }
            }
          </script>
        </nav>
      </aside>

      <!-- Konten Utama -->
      <main class="col-md-9 col-lg-10 main-content" id="main-content">
        <!-- Konten akan dimuat secara dinamis di sini -->
      </main>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../css-js/script.js"></script>
  
</body>

</html>