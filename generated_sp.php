<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once 'connection.php'; 

use setasign\Fpdi\Fpdi;

// Ambil data dari parameter GET
$id_masalah = isset($_GET['id_masalah']) ? intval($_GET['id_masalah']) : 0;
$sp = isset($_GET['sp']) ? intval($_GET['sp']) : 1; 


if ($id_masalah <= 0 || !in_array($sp, [1, 2, 3])) {
    die("ID masalah atau nomor SP tidak valid");
}

$sql = "
    SELECT 
        s.nama_siswa,
        s.nisn,
        s.jurusan,
        s.kelas,
        s.nama_ortu,
        s.no_ortu,
        p.jenis_pelanggaran,
        p.poin_pelanggaran,
        sb.tgl_pelanggaran,
        sb.keterangan,
        u.nama AS nama_admin
    FROM siswa_bermasalah sb
    JOIN siswa s ON sb.id_siswa = s.id_siswa
    JOIN pelanggaran p ON sb.id_pelanggaran = p.id_pelanggaran
    JOIN user u ON sb.id_admin = u.id_admin
    WHERE sb.id_masalah = $id_masalah
";

$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Data tidak ditemukan");
}

$pdf = new FPDI();
$pdf->AddPage();

switch ($sp) {
    case 1:
        $templateFile = 'template/SURAT PERINGATAN 1.pdf';
        break;
    case 2:
        $templateFile = 'template/SURAT PERINGATAN 2.pdf';
        break;
    case 3:
        $templateFile = 'template/SURAT PERINGATAN 3.pdf';
        break;
    default:
        die("Nomor SP tidak valid");
}

// Cek apakah file template ada
if (!file_exists($templateFile)) {
    die("Template tidak ditemukan: $templateFile");
}

// Load template
$pdf->setSourceFile($templateFile);
$template = $pdf->importPage(1);
$pdf->useTemplate($template);
// Set font

// NAMA di bagian "Yth"
$pdf->SetFont('Times', 'B', 12);
$pdf->SetXY(33, 83); 
$pdf->Write(6, $data['nama_siswa']);

$pdf->SetFont('Times', '', 12);

$startY = 115;
$offset = 8.5;

// Nama
$pdf->SetXY(70, $startY);
$pdf->Write(6, $data['nama_siswa']);

// NISN
$pdf->SetXY(70, $startY + $offset);
$pdf->Write(6, $data['nisn']);

// Kelas
$pdf->SetXY(70, $startY + 2 * $offset);
$pdf->Write(6, $data['kelas']);

// Jurusan
$pdf->SetXY(70, $startY + 3 * $offset);
$pdf->Write(6, $data['jurusan']);


// Output PDF
$pdf->Output("I", "SP_{$data['nama_siswa']}.pdf");
?>
