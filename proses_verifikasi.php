<?php
include 'connection.php'; // Pastikan koneksi ke database

if (isset($_POST['terima'])) {
    $id_catatan = $_POST['id_catatan'];

    // Ambil data dari tabel verifikasi, siswa, dan pelanggaran
    $cek_query = "SELECT v.id_siswa, v.id_pelanggaran, v.id_admin, v.tgl_pelanggaran, p.poin_pelanggaran 
                  FROM verifikasi v
                  JOIN pelanggaran p ON v.id_pelanggaran = p.id_pelanggaran
                  WHERE v.id_catatan = ?";
    
    $stmt = $conn->prepare($cek_query);
    $stmt->bind_param("i", $id_catatan);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();

        // Masukkan data ke siswa_bermasalah
        $insert_query = "INSERT INTO siswa_bermasalah (id_siswa, id_pelanggaran, id_admin, tgl_pelanggaran, status_masalah, total_poin)
                         VALUES (?, ?, ?, ?, 'verifikasi', ?)";
        
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("iiisi", $data['id_siswa'], $data['id_pelanggaran'], $data['id_admin'], $data['tgl_pelanggaran'], $data['poin_pelanggaran']);
        $stmt->execute();
        $stmt->close();

        // Hapus data dari verifikasi setelah dipindahkan
        $delete_query = "DELETE FROM verifikasi WHERE id_catatan = ?";
        $stmt = $conn->prepare($delete_query);
        $stmt->bind_param("i", $id_catatan);
        $stmt->execute();
        $stmt->close();
    }

    // Redirect kembali ke halaman admin
    header("Location: Dashboard/Dashboard%20Admin/sidebar.php");
    exit();
}

if (isset($_POST['tolak'])) {
    $id_catatan = $_POST['id_catatan'];

    // Hapus data dari tabel verifikasi jika ditolak
    $delete_query = "DELETE FROM verifikasi WHERE id_catatan = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $id_catatan);
    $stmt->execute();
    $stmt->close();

    // Redirect kembali ke halaman admin
    header("Location: Dashboard/Dashboard%20Admin/sidebar.php");
    exit();
}
?>
