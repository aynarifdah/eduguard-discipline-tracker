<?php
  include '../../connection.php';

  session_start();
  if (!isset($_SESSION['username'])) {
      header("Location: ../../login.php"); 
      exit();
  }
    
    // Ambil data laporan yang masih dalam status 'proses' dari tabel verifikasi
    $query = $conn->query("SELECT * FROM verifikasi WHERE status_verifikasi = 'proses'");
    
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="website icon" type="png" href="../img/logomerah.png">
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
                    <a href="laporan.php" class="nav-link"><i class="fa-solid fa-list"></i> Form Lapor</a>
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
           

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../css-js/script.js"></script>

    

</body>
</html>
