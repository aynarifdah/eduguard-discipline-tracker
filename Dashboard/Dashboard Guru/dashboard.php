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
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<body>

       
    <main class="main-content">
        <div class="main-header">
          <h1>Welcome Back, Guru!</h1>
        </div>


        <!-- Daftar Siswa -->
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
                        <th>Poin</th>
                        <th style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
            
                <tbody id="dataPelanggaran">
       

                </tbody>
       </div>
       </div>
       </div>
    
 <script>
    
        
    $(document).ready(function () {
    const dataPelanggaran = [
        { id: 1, nisn: "0123456", nama: "Vahira Nurfitria", kelas: "11 PPLG 2", poin: 45 },
        { id: 2, nisn: "0789101", nama: "Mikazuki Arion", kelas: "11 PPLG 2", poin: 30 },
        { id: 3, nisn: "0121314", nama: "Key Oriesa", kelas: "11 PPLG 2", poin: 100 }
    ];

    function loadPelanggaran(filter = "") {
        $("#dataPelanggaran").empty(); // Hapus data sebelum menambahkan yang baru
        let no = 1;

        dataPelanggaran.forEach(p => {
            $("#dataPelanggaran").append(`
                <tr>
                    <td>${no++}</td>
                    <td>${p.nisn}</td>
                    <td>${p.nama}</td>
                    <td>${p.kelas}</td>
                    <td>${p.poin}</td>
                    <td style="text-align:center;">
                       <a href="dashboard_siswa.php?nisn=<?= $row['nisn'] ?>">Detail</a>
                        <a href="#?id=${p.id}" class="btn btn-td">Lihat SP</a>
                    </td>
                </tr>
            `);
        });
    }

    loadPelanggaran();
});

 </script>
</main>
</body>
</html>
