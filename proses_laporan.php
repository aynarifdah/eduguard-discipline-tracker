<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_siswa = $_POST['nama_siswa'] ?? null;
    $tgl_pelanggaran = $_POST['tanggal'] ?? null;
    $id_kategori = $_POST['kategori'] ?? null;
    $id_pelanggaran = $_POST['pasal'] ?? null;
    $keterangan = $_POST['keterangan'] ?? null;
    $pelapor = $_POST['pelapor'] ?? null;
    $id_admin = $_SESSION['id_admin'] ?? null;

    if (!$nama_siswa || !$tgl_pelanggaran || !$id_kategori || !$id_pelanggaran || !$keterangan || !$pelapor) {
        echo "<script>
                alert('Error: Semua data harus diisi!');
                window.history.back();
              </script>";
        exit;
    }

    // Ambil id_siswa berdasarkan nama_siswa
    $querySiswa = "SELECT id_siswa FROM siswa WHERE nama_siswa = ?";
    $stmt = mysqli_prepare($conn, $querySiswa);
    mysqli_stmt_bind_param($stmt, "s", $nama_siswa);
    mysqli_stmt_execute($stmt);
    $resultSiswa = mysqli_stmt_get_result($stmt);
    $rowSiswa = mysqli_fetch_assoc($resultSiswa);

    if (!$rowSiswa) {
        echo "<script>
                alert('Error: Siswa tidak ditemukan!');
                window.history.back();
              </script>";
        exit;
    }

    $id_siswa = $rowSiswa['id_siswa'];

    // Ambil poin pelanggaran
    $queryPoin = "SELECT poin_pelanggaran FROM pelanggaran WHERE id_pelanggaran = ?";
    $stmtPoin = mysqli_prepare($conn, $queryPoin);
    mysqli_stmt_bind_param($stmtPoin, "i", $id_pelanggaran);
    mysqli_stmt_execute($stmtPoin);
    $resultPoin = mysqli_stmt_get_result($stmtPoin);
    $rowPoin = mysqli_fetch_assoc($resultPoin);
    $poin_pelanggaran = $rowPoin['poin_pelanggaran'];

    // **PISAHKAN LOGIKA BERDASARKAN SIAPA PELAPORNYA**
    if ($pelapor == "admin") {
        // ADMIN: langsung masuk ke siswa_bermasalah
        $queryInsert = "INSERT INTO siswa_bermasalah (id_siswa, id_pelanggaran, id_admin, tgl_pelanggaran, status_masalah, total_poin, keterangan) 
                        VALUES (?, ?, ?, ?, 'langsung masuk', ?, ?)";
        $stmtInsert = mysqli_prepare($conn, $queryInsert);
        mysqli_stmt_bind_param($stmtInsert, "iiisis", $id_siswa, $id_pelanggaran, $id_admin, $tgl_pelanggaran, $poin_pelanggaran, $keterangan);
        $redirect_url = "Dashboard/Dashboard%20Admin/sidebar.php"; // Balik ke dashboard admin
    } else {
        // GURU: masuk ke tabel verifikasi dulu
        $queryInsert = "INSERT INTO verifikasi (id_siswa, id_pelanggaran, id_admin, tgl_pelanggaran, status_verifikasi, keterangan) 
                        VALUES (?, ?, ?, ?, 'belum diverifikasi', ?)";
        $stmtInsert = mysqli_prepare($conn, $queryInsert);
        mysqli_stmt_bind_param($stmtInsert, "iiiss", $id_siswa, $id_pelanggaran, $id_admin, $tgl_pelanggaran, $keterangan);
        $redirect_url = "Dashboard/Dashboard%20Guru/sidebarguru.php"; // Balik ke dashboard guru
    }

    if (mysqli_stmt_execute($stmtInsert)) {
        echo "<script>
                alert('Laporan berhasil dikirim!');
                window.location.href = '$redirect_url';
              </script>";
    } else {
        echo "<script>
                alert('Error: " . mysqli_error($conn) . "');
                window.history.back();
              </script>";
    }

    mysqli_close($conn);
} else {
    echo "<script>
            alert('Error: Akses tidak valid!');
            window.history.back();
          </script>";
}
?>