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
    $query = "SELECT id_admin, username, role, nama FROM user WHERE username = '$username' AND password = '$password' AND role = 'admin'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Simpan data ke session
        $_SESSION['id_admin'] = $user['id_admin'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['nama'] = $user['nama']; 

        // Arahkan ke dashboard admin
        header("Location: Dashboard/Dashboard Admin/sidebar.php");
        exit;
    } else {
        echo "<script>
            alert('Username atau Password anda salah! Silakan coba lagi.');
            window.location.href='login.php';
          </script>";;
    }
} else if (strpos($username, 'guru_') === 0) {
    // Login untuk petugas (username diawali dengan "petugas_")
    $query = "SELECT id_admin, username, role, nama FROM user WHERE username = '$username' AND password = '$password' AND role = 'guru'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Simpan data ke session
        $_SESSION['id_admin'] = $user['id_admin'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['nama'] = $user['nama']; 

        // Arahkan ke dashboard petugas
        header("Location: Dashboard/Dashboard Guru/sidebarguru.php"); 
        exit;
    } else {
        echo "<script>
            alert('username atau Password anda salah! Silakan coba lagi.');
            window.location.href='login.php';
          </script>";;
    }
} else {
    // Login untuk masyarakat (username tanpa kode unik, hanya nama biasa)
    $query = "SELECT nisn, password, nama_siswa FROM siswa WHERE nisn = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);

    // Bandingkan password secara langsung tanpa hashing
    if ($password === $user['password']) {
        $_SESSION['nisn'] = $user['nisn'];
        $_SESSION['password'] = $user['password'];
        $_SESSION['nama_siswa'] = $user['nama_siswa']; 

        header("Location: Dashboard/Dashboard Siswa/sidebarsiswa.php");
        exit;
    } else {
        echo "<script>
            alert('NISN atau Password salah! Silakan coba lagi.');
            window.location.href='login.php';
          </script>";
    }
} 

}

// Tutup koneksi ke database
mysqli_close($conn);
?>
