<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css-js/sidebar.css">
</head>

<body>

           <main class="main-content" style=" width: 100%;">
                <div class="main-header">
                    <h1 style="color: white;">Welcome Back, Siswa/Siswi!</h1>
                  </div>

                <!-- Ringkasan Poin Pelanggaran -->
                <div class="card mb-4 ">
                    <div class="card-body">
                        <h5>Poin Pelanggaran</h5>
                        <p class="fs-1 text-danger" id="poin-siswa">0</p>
                        <p>Status: <span id="status-sp" class="badge bg-warning">Belum ada SP</span></p>
                    </div>
                </div>


                <!-- Riwayat Pelanggaran -->
                <div class="card">
                    <div class="card-body">
                        <h5>Riwayat Pelanggaran Terbaru</h5>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Pelanggaran</th>
                                    <th>Poin</th>
                                </tr>
                            </thead>
                            <tbody id="riwayat-pelanggaran">
                                <!-- Data akan di-load dengan JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../css-js/dashboard.css"></script>

    

</body>
</html>
