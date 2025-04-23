<?php
include '../../connection.php';

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../../login.php"); 
    exit();
}

$query = "SELECT sb.id_siswa, s.nisn, s.nama_siswa, s.kelas, 
                 COALESCE(SUM(p.poin_pelanggaran), 0) AS total_poin
          FROM siswa_bermasalah sb
          JOIN pelanggaran p ON sb.id_pelanggaran = p.id_pelanggaran
          JOIN siswa s ON sb.id_siswa = s.id_siswa
          GROUP BY sb.id_siswa, s.nisn, s.nama_siswa, s.kelas";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
       <!-- Bootstrap CSS -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
       <!-- Font Awesome -->
       <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
       <!-- Custom CSS -->
       <link rel="stylesheet" href="../css-js/dashboard.css">
    
</head>
<style>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<body>

       
    <main class="main-content">
        <div class="main-header">
        <h1>Welcome Back, <?php echo htmlspecialchars($_SESSION['nama']); ?>!</h1>
        </div>


        <!-- Daftar Siswa -->
        <div class="mt-5">
            <div class="card">
                

            <div class="row mb-3 align-items-center">
                <!-- Judul -->
                <div class="col">
                    <h4 class="mb-0">Siswa yang melakukan pelanggaran</h4>
                </div>
                <!-- Search Form -->
                <div class="col-auto">
                    <form class="d-flex">
                    <input class="form-control me-2" type="search" name="keyword" placeholder="Cari Jurusan..." aria-label="Search" style="max-width: 250px;"
                    >
                    <button class="btn btn-danger" type="submit">Cari</button>
                    </form>
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
                                <th>Poin</th>
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
                                    <td>{$row['total_poin']}</td>
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
</body>
</html>
