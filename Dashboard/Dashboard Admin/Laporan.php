<?php
include '../../connection.php';

// Ambil data kategori
$queryKategori = "SELECT * FROM kategori";
$resultKategori = mysqli_query($conn, $queryKategori);

//ambil data pasal
$queryPasal = "SELECT * FROM pelanggaran";
$resultPasal = mysqli_query($conn, $queryPasal);

// Ambil data siswa
$querySiswa = "SELECT * FROM siswa";
$resultSiswa = mysqli_query($conn, $querySiswa);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Laporan Pelanggaran</title>
    <link rel="stylesheet" href="../css-js/dashboard.css">


</head>
<body>
<main class="main-content">
    <div class="mt-5">
        <div class="card">
            <h2 class="mb-4 text-center">Form Laporan Pelanggaran</h2>
            <form action="../../proses_laporan.php" method="POST">
                <div class="mb-3">
                    <label for="nama_siswa" class="form-label">Nama:</label><br>
                    <small class="form-text text-danger">
                        * isi nama di awali huruf kapital
                    </small>
                    <input list="list_siswa" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Masukkan Nama Siswa">
                    <datalist id="list_siswa">
                        <?php while ($row = mysqli_fetch_assoc($resultSiswa)) : ?>
                            <option value="<?= $row['nama_siswa']; ?>" 
                                data-nisn="<?= $row['nisn']; ?>" 
                                data-kelas="<?= $row['kelas']; ?>"
                                data-jurusan="<?= $row['jurusan']; ?>">
                        <?php endwhile; ?>
                    </datalist>
                </div>

                <!-- Input NISN (terisi otomatis) -->
                <div class="mb-3">
                    <label for="nisn" class="form-label">NISN:</label>
                    <input type="text" class="form-control" id="nisn" name="nisn"  readonly>
                </div>

                <!-- Input Kelas (terisi otomatis) -->
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas:</label>
                    <input type="text" class="form-control" id="kelas" name="kelas" readonly>
                </div>

                <!-- Input Jurusan (terisi otomatis) -->
                <div class="mb-3">
                    <label for="jurusan" class="form-label">Jurusan:</label>
                    <input type="text" class="form-control" id="jurusan" name="jurusan" readonly>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal:</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                </div>

                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori:</label>
                    <select id="kategori" name="kategori" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        <?php while ($row = mysqli_fetch_assoc($resultKategori)) : ?>
                        <option value="<?= $row['id_kategori']; ?>"><?= $row['nama_kategori']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pasal" class="form-label">Pasal:</label>
                    <select id="pasal" name="pasal" class="form-select select2" required>
                        <option value="">-- Pilih Pasal --</option>
                        <?php while ($row = mysqli_fetch_assoc($resultPasal)) : ?>
                            <option 
                                value="<?= $row['id_pelanggaran']; ?>" 
                                title="<?= htmlspecialchars($row['jenis_pelanggaran']); ?>"
                            >
                                <?= mb_strimwidth($row['jenis_pelanggaran'], 0, 50, '...'); ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="poin" class="form-label">Poin:</label>
                    <span id="poin">-</span>
                </div>
                <div>
                    <select name="pelapor" required>
                        <option value="admin">Admin</option>
                        <option value="guru">Guru</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan:</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan">
                </div>
                <button type="submit" class="btn btn-laporan">Kirim</button>
            </form>

            <script>
                document.getElementById("nama_siswa").addEventListener("input", function () {
                let input = this.value;
                let list = document.getElementById("list_siswa").options;
                
                for (let i = 0; i < list.length; i++) {
                    if (list[i].value === input) {
                        let nisn = list[i].getAttribute("data-nisn");
                        let kelas = list[i].getAttribute("data-kelas");
                        let jurusan = list[i].getAttribute("data-jurusan");

                        document.getElementById("nisn").value = nisn;
                        document.getElementById("kelas").value = kelas;
                        document.getElementById("jurusan").value = jurusan;
                        break;
                    } else {
                        document.getElementById("nisn").value = "";
                        document.getElementById("kelas").value = "";
                        document.getElementById("jurusan").value = "";
                    }
                }
            });

                document.getElementById('kategori').addEventListener('change', function () {
                let kategoriID = this.value;
                let pasalSelect = document.getElementById('pasal');
                let poinElement = document.getElementById('poin');

                // Hapus opsi sebelumnya
                pasalSelect.innerHTML = '<option value="">-- Pilih Pasal --</option>';
                poinElement.innerText = '-';

                if (kategoriID !== '') {
                    // Data pasal diambil dari PHP
                    let pelanggaranData = <?php
                        $queryPelanggaran = "SELECT * FROM pelanggaran";
                        $resultPelanggaran = mysqli_query($conn, $queryPelanggaran);
                        $dataPelanggaran = [];
                        while ($row = mysqli_fetch_assoc($resultPelanggaran)) {
                            $dataPelanggaran[] = $row;
                        }
                        echo json_encode($dataPelanggaran);
                    ?>;

                    pelanggaranData.forEach(function (item) {
                        if (item.id_kategori == kategoriID) {
                            let option = document.createElement('option');
                            option.value = item.id_pelanggaran;
                            option.textContent = item.jenis_pelanggaran;
                            pasalSelect.appendChild(option);
                        }
                    });
                }
            });

            // Event listener untuk menampilkan poin berdasarkan pasal yang dipilih
            document.getElementById('pasal').addEventListener('change', function () {
                let pelanggaranID = this.value;
                let poinElement = document.getElementById('poin');

                if (pelanggaranID !== '') {
                    let poinData = <?php
                        $queryPoin = "SELECT id_pelanggaran, poin_pelanggaran FROM pelanggaran";
                        $resultPoin = mysqli_query($conn, $queryPoin);
                        $dataPoin = [];
                        while ($row = mysqli_fetch_assoc($resultPoin)) {
                            $dataPoin[$row['id_pelanggaran']] = $row['poin_pelanggaran'];
                        }
                        echo json_encode($dataPoin);
                    ?>;
                    poinElement.innerText = poinData[pelanggaranID] || '-';
                } else {
                    poinElement.innerText = '-';
                }
            });
            //untuk ubah warna button di readonly
            document.getElementById("nama_siswa").addEventListener("input", function () {
            let input = this.value;
            let list = document.getElementById("list_siswa").options;
            let nisn = document.getElementById("nisn");
            let kelas = document.getElementById("kelas");
            let jurusan = document.getElementById("jurusan");

            let ketemu = false;
            for (let i = 0; i < list.length; i++) {
                if (list[i].value === input) {
                    nisn.value = list[i].dataset.nisn;
                    kelas.value = list[i].dataset.kelas;
                    jurusan.value = list[i].dataset.jurusan;
                    ketemu = true;
                    break;
                }
            }
            if (!ketemu) nisn.value = kelas.value = jurusan.value = "";

            // Ubah background kalau ada isi
            [nisn, kelas, jurusan].forEach(el => {
                el.style.backgroundColor = el.value ? "#F1F1F1" : "";
            });
        });

            </script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            

        </div>
    </div>
</main>
</body>
</html>
