<?php

include '../../connection.php'; // Pastikan file koneksi sesuai dengan struktur folder

// Ambil data dari tabel verifikasi
$query = "SELECT v.id_catatan, s.nisn, s.nama_siswa, s.kelas, v.tgl_pelanggaran, k.nama_kategori, p.poin_pelanggaran
          FROM verifikasi v
          JOIN siswa s ON v.id_siswa = s.id_siswa
          JOIN pelanggaran p ON v.id_pelanggaran = p.id_pelanggaran
          JOIN kategori k ON p.id_kategori = k.id_kategori
          WHERE v.status_verifikasi = 'belum diverifikasi'";
          
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
    <title>Verifikasi Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css-js/dashboard.css">
</head>
<style>
  .card:hover {
  transform: translateY(-10px) scale(1.02);
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}
.btn-action {
    display: block;
    width: 100px;
    padding: 8px 12px;
    margin: 5px auto;
    border: none;
    border-radius: 5px;
    text-align: center;
    font-size: 14px;
    font-weight: bold;
    transition: 0.3s;
  }

  .btn-terima {
    background-color: #28a745; /* Hijau */
    color: white;
  }

  .btn-terima:hover {
    background-color: #218838;
  }

  .btn-tolak {
    background-color: #dc3545; /* Merah */
    color: white;
  }

  .btn-tolak:hover {
    background-color: #c82333;
  }

</style>
<body>
    <main class="main-content">
        <div class="card">
            <h4 class="mb-3">Data Laporan Menunggu Verifikasi</h4>
            <div class="table-responsive">
            <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NISN</th>
                            <th>NAMA</th>
                            <th>KELAS</th>
                            <th>TANGGAL</th>
                            <th>KATEGORI</th>
                            <th>POIN</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['nisn']; ?></td>
                                <td><?php echo $row['nama_siswa']; ?></td>
                                <td><?php echo $row['kelas']; ?></td>
                                <td><?php echo $row['tgl_pelanggaran']; ?></td>
                                <td><?php echo $row['nama_kategori']; ?></td>
                                <td><?php echo $row['poin_pelanggaran']; ?></td>
                                <td>
                                    <!-- Form untuk tombol Terima -->
                                    <form method="POST" action="../../proses_verifikasi.php">
                                        <input type="hidden" name="id_catatan" value="<?= $row['id_catatan']; ?>">
                                        <button type="submit" name="terima" class="btn-action btn-terima">Terima</button>
                                    </form>

                                    <!-- Form untuk tombol Tolak -->
                                    <form method="POST" action="../../proses_verifikasi.php">
                                        <input type="hidden" name="id_catatan" value="<?= $row['id_catatan']; ?>">
                                        <button type="submit" name="tolak" class="btn-action btn-tolak">Tolak</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </main>
</body>
</html>