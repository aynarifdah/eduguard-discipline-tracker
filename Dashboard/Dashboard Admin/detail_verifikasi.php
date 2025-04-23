<?php
include '../../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_catatan = $_POST['id_catatan'];
    
    // Update status verifikasi
    $query = "UPDATE verifikasi SET status_verifikasi = 'terverifikasi' WHERE id_catatan = '$id_catatan'";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Pelanggaran telah diverifikasi!'); window.location.href='table_verifikasi.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>