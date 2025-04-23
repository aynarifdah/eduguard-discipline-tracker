<?php
// Koneksi ke database
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $foto = $_POST['foto'];
    $nisn = $_POST['nisn'];
    $nama_siswa = $_POST['namasiswa'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $nama_ortu = $_POST['nama_ortu'];
    $no_ortu = $_POST['no_ortu'];
    $password = $_POST['password'];

    // Validasi input kosong
    if ( empty($nisn) || empty($nama_siswa) || empty($kelas) || empty($jurusan) || empty($nama_ortu) || empty($no_ortu) || empty($password) || empty($foto) ) {
        echo "Semua data harus diisi.";
        exit;
    }

    // Query untuk memasukkan data ke tabel masyarakat
    $stmt = $conn->prepare("INSERT INTO siswa (nisn, nama_siswa, kelas, jurusan, nama_ortu, no_ortu, password, foto) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $nisn, $nama_siswa, $kelas, $jurusan, $nama_ortu, $no_ortu, $password, $foto);

    if ($stmt->execute()) {
        echo "<script>
            alert('Registrasi Berhasil');
            window.location.href = 'http://localhost/aplikasi_kedisiplinan/Dashboard/Dashboard%20Admin/sidebar.php';  // Pastikan path benar
        </script>";
        exit;
    } else {
        echo "<script>
            alert('Registrasi gagal: " . addslashes($stmt->error) . "');
            window.location.href = 'add_siswa.php'; // Bisa diarahin ke halaman sebelumnya
        </script>";
    }

    $stmt->close();
}

$conn->close();
?>
