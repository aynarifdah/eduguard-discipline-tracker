<?php
// Koneksi ke database
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nisn = $_POST['nisn'];
    $nama_siswa = $_POST['nama_siswa'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $password = $_POST['password'];

    // Validasi input kosong
    if (empty($nisn) || empty($nama_siswa) || empty($kelas) || empty($jurusan) || empty($password)) {
        echo "Semua data harus diisi.";
        exit;
    }

    // Query untuk memasukkan data ke tabel masyarakat
    $stmt = $conn->prepare("INSERT INTO siswa (nisn, nama_siswa, kelas, jurusan, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nisn, $nama_siswa, $kelas, $jurusan, $password);

    if ($stmt->execute()) {
        echo "<script>
            alert('Registrasi Berhasil');
            window.location.href = 'http://localhost/aplikasi_kedisiplinan/Dashboard/Dashboard%20Admin/sidebar.php';  // Pastikan path benar
        </script>";
        exit;
    } else {
        echo "Gagal menyimpan data: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
