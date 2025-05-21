<?php
require __DIR__ . '/../../vendor/autoload.php';
include '../../connection.php'; 

use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST['upload'])) {
    $file = $_FILES['file_excel']['tmp_name'];

    $spreadsheet = IOFactory::load($file);
    $data = $spreadsheet->getActiveSheet()->toArray();

    for ($i = 1; $i < count($data); $i++) {
        $nisn = $data[$i][0];
        $nama = $data[$i][1];
        $kelas = $data[$i][2];
        $jurusan = $data[$i][3];
        $nama_ortu = $data[$i][4];
        $no_ortu = $data[$i][5];
        $password = 'siswa'; 
        $foto = ''; 

        // Simpan ke DB
        mysqli_query($conn, "INSERT INTO siswa (nisn, nama_siswa, kelas, jurusan, nama_ortu, no_ortu, password, foto)
                            VALUES ('$nisn', '$nama', '$kelas', '$jurusan', '$nama_ortu', '$no_ortu', '$password', '$foto')");
    }

    echo "<script>
            alert('Data Berhasil Ditambahkan!! Silakan Cek Data Siswa');
            window.location.href = 'http://localhost/aplikasi_kedisiplinan/Dashboard/Dashboard%20Admin/sidebar.php';  
        </script>";
        exit;
}
?>
