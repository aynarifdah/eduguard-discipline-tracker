<?php
// Koneksi ke database
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nip = isset($_POST['nip']) ? trim($_POST['nip']) : null;
    $nama = isset($_POST['nama']) ? trim($_POST['nama']) : null;
    $username = isset($_POST['username']) ? trim($_POST['username']) : null;
    $password = isset($_POST['password']) ? trim($_POST['password']) : null;
    $role = isset($_POST['role']) ? trim($_POST['role']) : null;


    // Validasi input kosong
    if (empty($nip) || empty($nama) || empty($username) || empty($password) || empty($role)) {
        echo "Semua data harus diisi.";
        exit;
    }

    // Validasi level
    $allowed_roles = ['admin', 'guru'];
    if (!in_array($role, $allowed_roles)) {
        echo "Role tidak valid.";
        exit;
    }

    // Validasi nomor telepon (hanya angka, minimal 10 digit)
    if (!preg_match('/^[0-9]{10,}$/', $nip)) {
        echo "NIP tidak valid. Harus terdiri dari minimal 10 angka.";
        exit;
    }

    // Enkripsi password sebelum menyimpan
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Query untuk memasukkan data ke tabel
        $stmt = $conn->prepare("INSERT INTO user (nip, nama, username, password, role) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nip, $nama, $username, $password, $role);

        if ($stmt->execute()) {
            echo "<script>
                alert('Registrasi Berhasil');
                window.location.href = 'http://localhost/aplikasi_kedisiplinan/Dashboard/Dashboard%20Admin/sidebar.php';  // Pastikan path benar
            </script>";
            exit;
        } else {
            echo "<script>
                alert('Registrasi gagal: " . addslashes($stmt->error) . "');
                window.location.href = 'add_admin.php'; // Bisa diarahin ke halaman sebelumnya
            </script>";
        }
        
        

        $stmt->close();
    } catch (Exception $e) {
        echo "Terjadi kesalahan: " . $e->getMessage();
    }
}

$conn->close();
?>
