<?php
session_start();
include 'connection.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Melakukan sanitasi input untuk menghindari SQL injection
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

if (strpos($username, 'admin_') === 0) {
    // Login untuk admin (username diawali dengan "admin_")
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password' AND role = 'admin'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Simpan data ke session
        $_SESSION['id_admin'] = $user['id_admin'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Arahkan ke dashboard admin
        header("Location: Dashboard/Dashboard Admin/sidebar.php");
        exit;
    } else {
        echo "Username atau password salah untuk admin.";
    }
} else if (strpos($username, 'guru_') === 0) {
    // Login untuk petugas (username diawali dengan "petugas_")
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password' AND role = 'guru'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Simpan data ke session
        $_SESSION['id_admin'] = $user['id_admin'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Arahkan ke dashboard petugas
        header("Location: Dashboard/Dashboard Guru/sidebarguru.php"); 
        exit;
    } else {
        echo "Username atau password salah untuk guru.";
    }
} else {
    // Login untuk masyarakat (username tanpa kode unik, hanya nama biasa)
    $query = "SELECT * FROM siswa WHERE nisn = '$username'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);

    // Bandingkan password secara langsung tanpa hashing
    if ($password === $user['password']) {
        $_SESSION['nisn'] = $user['nisn'];
        $_SESSION['password'] = $user['password'];

        header("Location: Dashboard/Dashboard Siswa/sidebarsiswa.php");
        exit;
    } else {
        echo "Password salah!";
    }
} else {
    echo "NISN tidak ditemukan!";
}

}

// Tutup koneksi ke database
mysqli_close($conn);
?>
