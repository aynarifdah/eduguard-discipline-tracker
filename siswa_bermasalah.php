<?php
include 'connection.php';

$query = "SELECT sb.id_masalah, s.nama_siswa, p.jenis_pelanggaran, sb.tgl_pelanggaran, sb.status_masalah 
          FROM siswa_bermasalah sb
          JOIN siswa s ON sb.id_siswa = s.id_siswa
          JOIN pelanggaran p ON sb.id_pelanggaran = p.id_pelanggaran";
$result = mysqli_query($conn, $query);
?>

<table border="1">
    <tr>
        <th>Nama Siswa</th>
        <th>Pelanggaran</th>
        <th>Tanggal</th>
        <th>Status</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['nama_siswa']; ?></td>
        <td><?php echo $row['jenis_pelanggaran']; ?></td>
        <td><?php echo $row['tgl_pelanggaran']; ?></td>
        <td><?php echo $row['status_masalah']; ?></td>
    </tr>
    <?php } ?>
</table>

<?php mysqli_close($conn); ?>
