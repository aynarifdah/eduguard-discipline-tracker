<?php
include __DIR__ . '/../../connection.php'; 

// Ambil ID siswa dari parameter
$id_siswa = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id_siswa > 0) {
    $query = "SELECT p.id_pelanggaran, v.tgl_pelanggaran, k.nama_kategori, p.jenis_pelanggaran, p.poin_pelanggaran
              FROM verifikasi v
              JOIN pelanggaran p ON v.id_pelanggaran = p.id_pelanggaran
              JOIN kategori k ON p.id_kategori = k.id_kategori
              WHERE v.id_siswa = ? AND v.status_verifikasi = 'terverifikasi'";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_siswa);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'tanggal' => $row['tgl_pelanggaran'],
            'kategori' => $row['nama_kategori'],
            'pasal' => '-', 
            'ayat' => '-', 
            'keterangan' => $row['jenis_pelanggaran'],
            'poin' => $row['poin_pelanggaran']
        ];
    }

    echo json_encode($data);
} else {
    echo json_encode([]);
}
?>