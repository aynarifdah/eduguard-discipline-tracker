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
            background-color:rgb(226, 10, 10); 
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
        }

        .detail-btn:hover {
            background-color:rgb(179, 0, 0); 
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
            <a href="add_siswa.php" class="text-decoration-none" style="display: block;">
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
                <h4 class="mb-3">Siswa yang melakukan pelanggaran</h4>
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
                                    <td>{$row['jurusan']}</td>
                                    <td>{$row['total_poin']}</td>
                                    <td>
                                        <select class='sp-dropdown'>
                                            <option>Pilih SP</option>
                                            <option value='SP1'>SP 1</option>
                                            <option value='SP2'>SP 2</option>
                                            <option value='SP3'>SP 3</option>
                                        </select>
                                        <a href='../../print_sp.php?id_masalah=" . $row['id_masalah'] . "' target='_blank' class='btn btn-danger'>Print</a>
                                    </td>
                                    <td>
                                        <button class='detail-btn'><a href=\"../Dashboard Siswa/dashboard.php?nisn=" .urlencode($row['nisn']) . "\" >Detail</a></button>
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
    </script>
</body>
</html>
