<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</style>
<body>
    
    <main class="main-content">
        <!-- Table Section -->
         
          <div class="card">
            <h4 class="mb-3">Data Laporan</h4>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama</th> 
                    <th>Kelas</th> 
                    <th>Tanggal</th>
                    <th>Kategori</th>
                    <th>Poin</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>015161718</td>
                    <td>Ayna dwi Rifdah s</td>
                    <td>XI PPLG 2</td>
                    <td>14-05-2024</td>
                    <td>Kedisiplinan</td>
                    <td>20</td>
                    <td>
                      <a href="detail_verifikasi.php" class="btn btn-td">Detail</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
      
</main>
</body>
</html>