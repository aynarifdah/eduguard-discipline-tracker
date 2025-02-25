<?php
include __DIR__ . '/../../connection.php';
  $query = "SELECT siswa.id_siswa, siswa.nisn, siswa.nama_siswa, siswa.kelas, 
  COALESCE(SUM(pelanggaran.poin_pelanggaran), 0) as total_poin, 
  MAX(poin.kategori_sp) as kategori_sp
  FROM siswa
  JOIN verifikasi ON siswa.id_siswa = verifikasi.id_siswa
  JOIN pelanggaran ON verifikasi.id_pelanggaran = pelanggaran.id_pelanggaran
  LEFT JOIN poin ON siswa.id_siswa = poin.id_siswa
  GROUP BY siswa.id_siswa, siswa.nisn, siswa.nama_siswa, siswa.kelas";

  $result = mysqli_query($conn, $query);

  if (!$result) {
  die("Query error: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
       <!-- Bootstrap CSS -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
       <!-- Font Awesome -->
       <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
       <!-- Custom CSS -->
       <link rel="stylesheet" href="../css-js/dashboard.css">
    
</head>
<style>
    /* Dropdown SP */
.sp-dropdown {
    padding: 5px;
    font-size: 14px;
    border-radius: 5px;
}

/* Tombol Kirim SP */
.sp-btn {
    background: red;
    color: white;
    padding: 5px 10px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

.sp-btn:disabled {
    background: gray;
    cursor: not-allowed;
}

.card:hover {
  transform: translateY(-10px) scale(1.02);
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

</style>
<body>

       
    <main class="main-content">
        <div class="main-header">
          <h1>Welcome Back, Admin!</h1>
        </div>

        <!-- Cards Section -->
        <div class="row custom-gap">
          <div Add class="col-md-5">
            <a href="add_admin.php"  class="text-decoration-none" style="display: block;">
              <div class="card text-center">
                <div class="card-icon mx-auto mb-2"><i class="fa-solid fa-user-plus"></i></div>
                <div class="card-body">
                  <h5 class="card-title"> Admin & Guru </h5>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-5">
            <a href="add_siswa.php" class="text-decoration-none" style="display: block;">
              <div class="card text-center">
                <div class="card-icon mx-auto mb-2"><i class="fa-solid fa-user-plus"></i></div>
                <div class="card-body">
                  <h5 class="card-title"> siswa </h5>
                </div>
              </div>
            </a>
          </div>
        </div>

        <!-- Daftar Siswa -->
        <div class="mt-5">
            <div class="card">
              <h4 class="mb-3">Siswa yang melakukan pelanggaran</h4>
              <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Poin</th>
                        <th>Surat Peringatan</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody id="siswa-list">
                  <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$no}</td>
                                <td>{$row['nisn']}</td>
                                <td>{$row['nama_siswa']}</td>
                                <td>{$row['kelas']}</td>
                                <td>{$row['total_poin']}</td>
                                <td>{$row['kategori_sp']}</td>
                                <td style='text-align: center;'><a href='detail_pelanggaran.php?id={$row['id_siswa']}'>Detail</a></td>
                              </tr>";
                        $no++;
                    }
                    ?>
                            
                </tbody>
            </table>
       </div>
       </div>
       </div>
    

    <script src="../css-js/sp.js"></script>
</main>
</body>
</html>
