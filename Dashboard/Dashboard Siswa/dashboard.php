<?php
session_start();
include '../../connection.php';

// Jika admin mengklik siswa lain, update session NISN
if (isset($_GET['nisn'])) {
    $_SESSION['nisn'] = $_GET['nisn']; // Perbarui session NISN sesuai URL
}

// Pastikan session NISN ada
if (!isset($_SESSION['nisn'])) {
    header("Location: ../../login.php");
    exit();
}

// Ambil data siswa berdasarkan NISN dari session
$nisn = $_SESSION['nisn'];
$querySiswa = "SELECT * FROM siswa WHERE nisn = '" . mysqli_real_escape_string($conn, $nisn) . "'";
$resultSiswa = mysqli_query($conn, $querySiswa);
$dataSiswa = mysqli_fetch_assoc($resultSiswa);

// Jika data siswa tidak ditemukan, hapus session agar tidak terkunci
if (!$dataSiswa) {
    session_unset();
    session_destroy();
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
    <title>Dashboard Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css-js/sidebar.css">
</head>

<body>
    <main class="main-content" style="width: 100%;">
        <div class="main-header">
            <h1 style="color: white;">Welcome Back, <?php echo htmlspecialchars($dataSiswa['nama_siswa']); ?>!</h1>
        </div>

        <!-- Ringkasan Poin Pelanggaran -->
        <div class="card mb-4">
            <div class="card-body">
                <h5>Poin Pelanggaran</h5>
                <p class="fs-1 text-danger"><?php echo $totalPoin; ?></p>
                <p>Status: <span class="badge <?php echo $badgeClass; ?>"><?php echo $statusSP; ?></span></p>
            </div>
        </div>

        <div>
    <h3 style="color: white;">Biodata <span style="color:rgb(207, 207, 207); font-size:15px;">siswa</span></h3>

    <div style="display: flex; gap: 20px; align-items: stretch;">

        <!-- Card pertama (kotak biasa) -->
        <div class="card custom-gap" style="width: 20rem;">
        
        <?php
            // Ambil isi foto dari database
            $fotoBlob = $dataSiswa['foto'];

            // Ubah ke format base64
            $fotoBase64 = base64_encode($fotoBlob);
            $src = 'data:image/jpeg;base64,' . $fotoBase64;
        ?>
        <img src="<?php echo $src; ?>" alt="Foto Siswa" width="83%" style="padding:40px; padding-bottom:0; display: block; margin: 0 auto;">
            <div class="card-body">
                <p class="card-text" style="text-align: center; font-weight: bold;"><?php echo htmlspecialchars($dataSiswa['nama_siswa']); ?></p>
                <hr>
                <p class="card-text" style="text-align: center; font-size:14px; color:grey;"><?php echo htmlspecialchars($dataSiswa['nisn']); ?></p>
                <hr>
            </div>
        </div>

        <!-- Card kedua (persegi panjang ke kanan) -->
        <div class="card" style="width: 50rem; display: flex; padding: 20px;">
            <p style="margin-bottom: 20px;">Profile</p>
            <div >
             <div style="display: flex; flex-direction: column; gap: 8px; font-family: Arial; font-size: 14px;">
                <div style="display: flex;">
                    <div style="width: 180px;">NISN</div>
                    <div>: <?php echo htmlspecialchars($dataSiswa['nisn']); ?></div>
                </div>
                <div style="display: flex;">
                    <div style="width: 180px;">Nama Lengkap</div>
                    <div>: <?php echo htmlspecialchars($dataSiswa['nama_siswa']); ?></div>
                </div>
                <div style="display: flex;">
                    <div style="width: 180px;">Kelas</div>
                    <div>: <?php echo htmlspecialchars($dataSiswa['kelas']); ?></div>
                </div>
                <div style="display: flex;">
                    <div style="width: 180px;">Jurusan</div>
                    <div>: <?php echo htmlspecialchars($dataSiswa['jurusan']); ?></div>
                </div>
                <div style="display: flex;">
                    <div style="width: 180px;">Nama Orangtua</div>
                    <div>: <?php echo htmlspecialchars($dataSiswa['nama_ortu']); ?></div>
                </div>
                <div style="display: flex;">
                    <div style="width: 180px;">Nomor Orangtua</div>
                    <div>: <?php echo htmlspecialchars($dataSiswa['no_ortu']); ?></div>
               
                </div>
            </div>
        </div>
    </div>
</div>

    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>
