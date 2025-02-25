<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pelanggaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css-js/dashboard.css">
</head>
<style>
    body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(to bottom, #B82132 70%, #f4f7fd 70%);
    background-repeat: no-repeat;
    background-attachment: fixed;
     }
    .card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }
</style>
<body>
    <main class="main-content">

        
        <!-- Daftar Siswa -->
       
            <h3 class="mb-4" style="color: white;">Riwayat Pelanggaran<h3>
            <div class="card">
            <div class="table-responsive">
            <table class="table table-hover" style="font-size: 17px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Pelanggaran</th>
                        <th>Poin</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="riwayatPelanggaran">
                    <!-- Data akan dimuat dengan JavaScript -->
                </tbody>
            </table>
       </div>
       </div>
    </main>
       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
       <script>
        
$(document).ready(function () {
    const dataPelanggaran = [
        {id:1 ,  tanggal: "2025-02-01", pelanggaran: "Terlambat", poin: 10 },
        {id:2, tanggal: "2025-02-03", pelanggaran: "Tidak membawa buku", poin: 5 },
        {id:3, tanggal: "2025-02-05", pelanggaran: "Bolos", poin: 20 },
        {id:5, tanggal: "2025-02-07", pelanggaran: "Merokok di sekolah", poin: 50 }
    ];

    function loadPelanggaran(filter = "") {
        
        let no = 1;

        dataPelanggaran.forEach(p => {
            if (p.pelanggaran.toLowerCase().includes(filter.toLowerCase()) || p.tanggal.includes(filter)) {
                $("#riwayatPelanggaran").append(`
                    <tr>
                        <td>${no++}</td>
                        <td>${p.tanggal}</td>
                        <td>${p.pelanggaran}</td>
                        <td class="text-danger fw-bold">${p.poin}</td>
                        <td>
                              <a href="detail_pelanggaran.php?id=${p.id}" class="btn btn-td ">Detail</a>
                        </td>
                    </tr>
                `);
            }
        });
    }

    loadPelanggaran();

});
</script>

</body>
</html>
