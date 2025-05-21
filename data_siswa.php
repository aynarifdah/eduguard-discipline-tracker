<?php
require_once 'connection.php'; 

$query = "SELECT * FROM siswa";
$result = mysqli_query($conn, $query);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .table th {
            background-color: #eaeaea;
        }
        .table {
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .table th:first-child {
            border-top-left-radius: 12px;
        }

        .table th:last-child {
            border-top-right-radius: 12px;
        }

        .table tr:last-child td:first-child {
            border-bottom-left-radius: 12px;
        }

        .table tr:last-child td:last-child {
            border-bottom-right-radius: 12px;
        }

    </style>
</head>
<body>
<main class="main-content">
<div class="mt-5">
                <div class="card">
                <div class="mx-5 mt-4">
                <!-- Judul -->
                <!-- Header Judul dan Search Form -->
                        <div class="row mb-3">
                            <div class="d-flex justify-content-between align-items-center ">
                                <!-- Judul -->
                                <h4 class="mb-0">Data Siswa</h4>

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
                                        </tr>";
                                        $no++;
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script>
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
</main>
</body>
</html>
