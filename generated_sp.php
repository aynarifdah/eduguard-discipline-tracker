<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once 'connection.php';

use setasign\Fpdi\Fpdi;

$id_masalah = isset($_GET['id_masalah']) ? intval($_GET['id_masalah']) : 0;

if ($id_masalah <= 0) {
    die("ID masalah tidak valid");
}

// Ambil data dari database
$stmt = $pdo->prepare("
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
    WHERE sb.id_masalah = ?
");
$stmt->execute([$id_masalah]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
    die("Data tidak ditemukan");
}

// Generate PDF dengan FPDI
$pdf = new Fpdi('P', 'mm', 'A4');
$pdf->AddPage();

// Template SP kamu (ganti nanti)
// $templatePath = 'template/??';------
$pdf->Image($templatePath, 0, 0, 210); // full page background

$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(0, 0, 0);

// Atur posisi dan isi data siswa
$pdf->SetXY(30, 60);
$pdf->Cell(0, 10, "Nama Siswa: " . $data['nama_siswa'], 0, 1);

$pdf->SetX(30);
$pdf->Cell(0, 10, "NISN: " . $data['nisn'], 0, 1);

$pdf->SetX(30);
$pdf->Cell(0, 10, "Kelas: " . $data['kelas'] . " - " . $data['jurusan'], 0, 1);

$pdf->SetX(30);
$pdf->Cell(0, 10, "Nama Orang Tua: " . $data['nama_ortu'], 0, 1);

$pdf->SetX(30);
$pdf->Cell(0, 10, "No. HP Ortu: " . $data['no_ortu'], 0, 1);

$pdf->Ln(10);
$pdf->SetX(30);
$pdf->MultiCell(150, 8, "Pelanggaran: " . $data['jenis_pelanggaran'] . "\nPoin: " . $data['poin_pelanggaran'], 0);

$pdf->Ln(5);
$pdf->SetX(30);
$pdf->Cell(0, 10, "Tanggal Pelanggaran: " . date("d M Y", strtotime($data['tgl_pelanggaran'])), 0, 1);

$pdf->Ln(10);
$pdf->SetX(120);
$pdf->Cell(0, 10, "Admin: " . $data['nama_admin'], 0, 1, 'R');

// Output PDF
$filename = 'SP_' . preg_replace('/[^a-zA-Z0-9]/', '_', $data['nama_siswa']) . '.pdf';
$pdf->Output('I', $filename);
