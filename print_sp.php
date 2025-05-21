<?php
include 'connection.php';

$id_masalah = $_GET['id_masalah'];

$query = "SELECT sb.*, 
                 s.nisn, s.nama_siswa, s.kelas, s.jurusan, s.nama_ortu,
                 p.jenis_pelanggaran, p.poin_pelanggaran,
                 u.nama 
          FROM siswa_bermasalah sb
          JOIN siswa s ON sb.id_siswa = s.id_siswa
          JOIN pelanggaran p ON sb.id_pelanggaran = p.id_pelanggaran
          JOIN user u ON sb.id_admin = u.id_admin
          WHERE sb.id_masalah = $id_masalah";

$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

$kategori_sp = '';
if ($data['total_poin'] >= 30) {
    $kategori_sp = 'SP 3';
} elseif ($data['total_poin'] >= 20) {
    $kategori_sp = 'SP 2';
} else {
    $kategori_sp = 'SP 1';
}
?>

<!DOCTYPE html>
<html>
<head>
  <title><?= $kategori_sp ?> - Surat Peringatan</title>
  <style>
    body { font-family: "Times New Roman", Times, serif; margin: 40px; }
    .center { text-align: center; }
    .ttd { margin-top: 50px; width: 100%; display: flex; justify-content: space-between; }
  </style>
</head>
<body>

  <div class="center">
    <h3>SURAT PERINGATAN <?= $kategori_sp ?></h3>
    <p>Nomor: 045/SP/<?= date("Y") ?>/<?= $data['id_masalah'] ?></p>
  </div>

  <p>Kepada Yth.</p>
  <p>Orang Tua/Wali dari:</p>
  <table>
    <tr><td>Nama</td><td>: <?= $data['nama_siswa'] ?></td></tr>
    <tr><td>NISN</td><td>: <?= $data['nisn'] ?></td></tr>
    <tr><td>Kelas</td><td>: <?= $data['kelas'] ?> / <?= $data['jurusan'] ?></td></tr>
  </table>

  <br>
  <p>Dengan ini kami sampaikan bahwa siswa tersebut telah melakukan pelanggaran tata tertib sekolah berupa:</p>
  <p><strong>"<?= $data['jenis_pelanggaran'] ?>"</strong> dengan poin pelanggaran <strong><?= $data['poin_pelanggaran'] ?> poin</strong> pada tanggal <?= $data['tgl_pelanggaran'] ?>.</p>

  <p>Total poin akumulasi saat ini adalah <strong><?= $data['total_poin'] ?> poin</strong>, sehingga diberikan <strong><?= $kategori_sp ?></strong> sebagai surat peringatan.</p>

  <p>Surat ini bersifat resmi sebagai bentuk pembinaan agar pelanggaran serupa tidak terulang. Bila masih terjadi, maka akan diberlakukan sanksi sesuai aturan yang berlaku.</p>

  <p>Demikian surat ini disampaikan untuk menjadi perhatian bersama.</p>

  <div class="ttd">
    <div>
      Mengetahui,<br>
      Orang Tua / Wali<br><br><br>
      ( <?= $data['nama_ortu'] ?> )
    </div>
    <div>
      <?= date("d F Y") ?><br>
      Admin Tata Tertib<br><br><br>
      ( Tim Ketarunaan )
    </div>
  </div>

  <script>
    window.print();
  </script>

</body>
</html>
