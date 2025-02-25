<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Verifikasi</title>
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Font Awesome -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
      <!-- Custom CSS -->
      <link rel="stylesheet" href="../css-js/dashboard.css">
      
</head>
<style>
       body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, #B82132 70%, #f4f7fd 70%);
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 100vh;
            margin-top: 40px;
        }
        .btn-proses{
            background-color: green;
            color: white;
        }
</style>
<body>
    <main class="main-content" style="margin: 40px;">

        
        <!-- Daftar Siswa -->
       
        <div class="card">
            <h3 class="mb-4">Riwayat Pelanggaran<h3>
            <div class="table-responsive">
            <table class="table table-hover" style="font-size: 17px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>kategori</th>
                        <th>pasal</th>
                        <th>ayat</th>
                        <th>Keterangan</th>
                        <th>poin</th>
                        
                    </tr>
                </thead>
                <tbody id="detail-content">
                    <!-- Data akan dimuat dengan JavaScript -->
                </tbody>
            </table>
      
         <a href="sidebarguru.php" class="btn btn-td">Kembali</a>
       
           <script>
               function getQueryParam(param) {
                   const urlParams = new URLSearchParams(window.location.search);
                   return urlParams.get(param);
               }

       
               document.addEventListener("DOMContentLoaded", function() {
                   const id = getQueryParam("id");
                   let no = 1;
                   const detailData = {
                       1: [
                           { tanggal: "01-03-2024", kategori: "Kedisiplinan", pasal: 5, ayat: 2, keterangan: "Tidak memakai atribut lengkap", poin: 5 },
                           { tanggal: "03-03-2024", kategori: "Ketertiban", pasal: 3, ayat: 1, keterangan: "Terlambat masuk kelas", poin: 3 }
                       ],
                       2: [
                           { tanggal: "05-03-2024", kategori: "Kedisiplinan", pasal: 5, ayat: 2, keterangan: "Tidak memakai atribut lengkap", poin: 5 },
                           { tanggal: "06-03-2024", kategori: "pakaian", pasal: 3, ayat: 1, keterangan: "Tidak memakai dasi", poin: 3 }
                       ]
                       
                   };
                   
                   const detailContent = document.getElementById("detail-content");
                   if (detailData[id]) {
                       detailContent.innerHTML = detailData[id].map(item => `
                           <tr>
                               <td>${no++}</td> 
                               <td>${item.tanggal}</td> 
                               <td>${item.kategori}</td>
                               <td>${item.pasal}</td>
                               <td>${item.ayat}</td>
                               <td>${item.keterangan}</td>
                               <td>${item.poin}</td>
                           </tr>
                       `).join('');
                   } else {
                       detailContent.innerHTML = '<tr><td colspan="6">Data tidak ditemukan</td></tr>';
                   }
               });
           </script>

</body>
</html>
