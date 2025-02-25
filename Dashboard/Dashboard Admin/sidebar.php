<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Interaktif</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
          <a href="data_pelanggaran.php" class="nav-link "><i class="fa-solid fa-house"></i>Dashboard</a>
          <a href="Laporan.php" class="nav-link"><i class="fa-solid fa-envelope"></i> Laporan Pelanggaran</a>
          <a href="table_verifikasi.php" class="nav-link"><i class="fa-solid fa-chart-bar"></i> Verifikasi</a>
          <a href="logout.php" style="text-decoration: none;"><i class="fa-solid fa-sign-out-alt" onclick="logout()"></i> Logout</a>
         
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
  <script src="../css-js/sp.js"></script>
  
</body>

</html>
