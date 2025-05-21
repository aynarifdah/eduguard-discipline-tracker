<?php
session_start();
include '../../connection.php';

if (!isset($_SESSION['nisn'])) {
    // Cek apakah ada NISN dari URL (admin yang klik detail)
    if (isset($_GET['nisn'])) {
        $_SESSION['nisn'] = $_GET['nisn']; // Simpan sementara di session
    } else {
        header("Location: ../../login.php");
        exit();
    }
}

// Ambil data siswa berdasarkan sesi login
$nisn = $_SESSION['nisn'];
$querySiswa = "SELECT * FROM siswa WHERE nisn = '" . mysqli_real_escape_string($conn, $nisn) . "'";
$resultSiswa = mysqli_query($conn, $querySiswa);
$dataSiswa = mysqli_fetch_assoc($resultSiswa);

if (!$dataSiswa) {
    echo "Data siswa tidak ditemukan!";
    exit();
}

$id_siswa = $dataSiswa['id_siswa'];

// Ambil total poin pelanggaran siswa
$queryPoin = "SELECT COALESCE(SUM(p.poin_pelanggaran), 0) AS total_poin 
              FROM siswa_bermasalah sb
              JOIN pelanggaran p ON sb.id_pelanggaran = p.id_pelanggaran
              WHERE sb.id_siswa = '" . mysqli_real_escape_string($conn, $id_siswa) . "'";
$resultPoin = mysqli_query($conn, $queryPoin);
$dataPoin = mysqli_fetch_assoc($resultPoin);
$totalPoin = $dataPoin['total_poin'] ?? 0;

// Tentukan status SP berdasarkan total poin
$statusSP = "Belum ada SP";
$badgeClass = "bg-success";
if ($totalPoin >= 10 && $totalPoin < 30) {
    $statusSP = "SP 1";
    $badgeClass = "bg-warning";
} elseif ($totalPoin >= 30 && $totalPoin < 50) {
    $statusSP = "SP 2";
    $badgeClass = "bg-danger";
} elseif ($totalPoin >= 50) {
    $statusSP = "SP 3";
    $badgeClass = "bg-dark";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pelanggaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css-js/sidebar.css">
</head>
<style>

    
</style>
<body>
    <main class="main-content">

        
        <!-- Daftar Siswa -->
       
            <h3 class="mb-4" style="color: white;">Riwayat Pelanggaran<h3>

            <div class="card mb-4">
            <div class="card-body">
                <h5>Jumlah Poin Pelanggaran</h5>
                <p class="fs-1 text-danger"><?php echo $totalPoin; ?></p>
                <p style="font-size:15px;">Status: <span class="badge <?php echo $badgeClass; ?>"><?php echo $statusSP; ?></span></p>
            </div>
            </div>

        <div class="card">
            <div class="table table-striped" style="margin: 20px;">
            <table class="table table-hover" style="font-size: 17px;width:95%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Pelanggaran</th>
                        <th>Poin</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody style="font-size: 16x;">
                        <?php
                        $queryRiwayat = "SELECT p.jenis_pelanggaran, p.poin_pelanggaran, sb.tgl_pelanggaran, sb.keterangan
                        FROM siswa_bermasalah sb
                        JOIN pelanggaran p ON sb.id_pelanggaran = p.id_pelanggaran
                        WHERE sb.id_siswa = '" . mysqli_real_escape_string($conn, $id_siswa) . "'
                        ORDER BY sb.tgl_pelanggaran DESC";
       
                        $resultRiwayat = mysqli_query($conn, $queryRiwayat);
                        $no = 1;

                        if (mysqli_num_rows($resultRiwayat) > 0) {
                            while ($row = mysqli_fetch_assoc($resultRiwayat)) {
                                echo "<tr>";
                                echo "<td>" . $no++ . "</td>";
                                echo "<td>" . htmlspecialchars($row['tgl_pelanggaran']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['jenis_pelanggaran']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['poin_pelanggaran']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['keterangan'] ?? "Tidak ada keterangan") . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4' class='text-center'>Belum ada pelanggaran</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
       </div>
    
       
    </main>
       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>
