<?php

    $hostname = 'localhost';
    $username = 'root'; // Menggunakan 'username' bukan 'servername'
    $password = '';
    $dbname = 'eduguard';

    // Membuat koneksi
    $conn = mysqli_connect($hostname, $username, $password, $dbname);

    // Cek koneksi
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

?>