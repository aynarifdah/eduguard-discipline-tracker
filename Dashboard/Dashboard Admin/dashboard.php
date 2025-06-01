    <?php
    include '../../connection.php';

    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: ../../login.php"); 
        exit();
    }

    $query = "SELECT s.id_siswa, s.nisn, s.nama_siswa, s.kelas, s.jurusan,
    (SELECT sb2.id_masalah 
     FROM siswa_bermasalah sb2 
     WHERE sb2.id_siswa = s.id_siswa 
     ORDER BY sb2.id_masalah DESC LIMIT 1) AS id_masalah,
    COALESCE(SUM(p.poin_pelanggaran), 0) AS total_poin
    FROM siswa_bermasalah sb
    JOIN pelanggaran p ON sb.id_pelanggaran = p.id_pelanggaran
    JOIN siswa s ON sb.id_siswa = s.id_siswa
    GROUP BY s.id_siswa, s.nisn, s.nama_siswa, s.kelas, s.jurusan";

    $result = mysqli_query($conn, $query);
    ?>

    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../css-js/dashboard.css">
        <style>
            .sp-dropdown {
                padding: 5px;
                font-size: 14px;
                border-radius: 5px;
            }
            .sp-btn {
                background: rgb(226, 10, 10);
                color: white;
                padding: 5px 10px;
                border: none;
                cursor: pointer;
                border-radius: 5px;
            }
            .sp-btn:disabled {
                background: gray;
                cursor: not-allowed;
            }
            .card:hover {
                transform: translateY(-10px) scale(1.02);
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            }
        
            .detail-btn {
                display: inline-flex;
                align-items: center;
                background-color:rgb(40, 183, 12); 
                color: white;
                padding: 8px 12px;
                border-radius: 5px;
                text-decoration: none;
                font-size: 14px;
                font-weight: bold;
            }

            .detail-btn:hover {
                background-color:rgb(21, 179, 0); 
                transform: scale(1.05); 
            }

            .detail-btn i {
                margin-right: 5px;
            }
            a {
                text-decoration: none; 
                color:rgb(255, 255, 255); 
                transition: color 0.3s ease-in-out;
            }
            .custom-gap{
            gap: 165px;
            }

        </style>
    </head>
    <body>
        <main class="main-content">
            <div class="main-header">
            <h1>Welcome Back, <?php echo htmlspecialchars($_SESSION['nama']); ?>!</h1>
            </div>

            <!-- Cards Section -->
            <div class="row custom-gap">
            <div Add class="col-md-5">
                <a href="add_admin.php"  class="text-decoration-none" style="display: block;">
                <div class="card text-center">
                    <div class="card-icon mx-auto mb-2"><i class="fa-solid fa-user-plus"></i></div>
                    <div class="card-body">
                    <h5 class="card-title"> Admin & Guru </h5>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-5">
                <a href="add.php" class="text-decoration-none" style="display: block;">
                <div class="card text-center">
                    <div class="card-icon mx-auto mb-2"><i class="fa-solid fa-user-plus"></i></div>
                    <div class="card-body">
                    <h5 class="card-title"> siswa </h5>
                    </div>
                </div>
                </a>
            </div>
            </div>

            <div class="mt-5">
                <div class="card">
                <!-- Judul -->
                <!-- Header Judul dan Search Form -->
                        <div class="row mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Judul -->
                                <h4 class="mb-0">Siswa yang melakukan pelanggaran</h4>

                                <!-- Search Form -->
                                <select id="filterJurusan" class="form-select d-flex" style="margin:10px;width:300px;" aria-label="Default select example">
                                    <option value="">Cari jurusan</option>
                                    <option value="PPLG">PPLG</option>
                                    <option value="PH">PH</option>
                                    <option value="DKV">DKV</option>
                                    <option value="TKRO">TKRO</option>
                                    <option value="TBSM">TBSM</option>
                                    <option value="AKL">AKL</option>
                                </select>

                               
                            </div>
                        </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Jurusan</th>
                                    <th>Poin</th>
                                    <th>Surat Peringatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>
                                        <td>{$no}</td>
                                        <td>{$row['nisn']}</td>
                                        <td>{$row['nama_siswa']}</td>
                                        <td>{$row['kelas']}</td>
                                        <td class='jurusan-cell'>{$row['jurusan']}</td>
                                        <td>{$row['total_poin']}</td>
                                        <td>
                                        <form action='../../generated_sp.php' method='GET' target='_blank'>
                                            <select name='sp' class='sp-dropdown' required>
                                                <option value=''>Pilih SP</option>
                                                <option value='1'>SP 1</option>
                                                <option value='2'>SP 2</option>
                                                <option value='3'>SP 3</option>
                                            </select>
                                            <input type='hidden' name='id_masalah' value='" . $row["id_masalah"] . "'>

                                            <!-- Tombol submit -->
                                            <button type='submit' class='btn btn-danger'>Print</button>
                                        </form>
                                    </td>
                                    </tr>";
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <script>
            document.querySelectorAll('.sp-dropdown').forEach(dropdown => {
                dropdown.addEventListener('change', function() {
                    let btn = this.nextElementSibling;
                    btn.disabled = this.value === 'Pilih SP';
                });
            });
            document.getElementById('filterJurusan').addEventListener('change', function () {
                const selectedJurusan = this.value.toUpperCase();
                const rows = document.querySelectorAll('table tbody tr');

                rows.forEach(row => {
                    const jurusanText = row.querySelector('.jurusan-cell')?.textContent.toUpperCase() || "";
                    if (!selectedJurusan || jurusanText.includes(selectedJurusan)) {
                        row.style.display = "";
                    } else {
                        row.style.display = "none";
                    }
                });
            });

        </script>
    </body>
    </html>
