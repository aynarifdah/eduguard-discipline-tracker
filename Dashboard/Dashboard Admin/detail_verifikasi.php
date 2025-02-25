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
    <main class="col-md-9 col-lg-10 main-content">

        <div class="card">
        <div class="md-5">
        <td><a href="sidebar.php" class="btn btn-td ">Kembali</a></td>
        <td><a href="sidebar.php" class="btn btn-proses ">Proses</a></td>
        </div>
        <br>

        <div class="mb-3">
            <label for="nisn" class="form-label">NISN:</label>
            <input type="text" class="form-control" id="nisn" readonly>
        </div>

        <div class="mb-3">
            <label for="namasiswa" class="form-label">Nama:</label>
            <input type="text" class="form-control" id="namasiswa" readonly>
        </div>
        <div class="mb-3">
            <label for="Kelas" class="form-label">Kelas:</label>
            <input type="text" class="form-control" id="Kelas" readonly>
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal:</label>
            <input type="text" class="form-control" id="tanggal" readonly>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label ">kategori:</label>
            <input type="text" class="form-control" id="kategori" name="kategori" readonly>
        </div>
        <div class="mb-3">
            <label for="pasal" class="form-label ">Pasal:</label>
            <input type="text" class="form-control" id="Pasal" name="pasal" readonly>
        </div>
        <div class="mb-3">
            <label for="ayat" class="form-label ">Ayat:</label>
            <input type="text" class="form-control" id="ayat" name="ayat" readonly>
        </div>
        <div class="mb-3">
            <label for="poin" class="form-label ">Poin:</label>
            <input type="text" class="form-control" id="poin" name="poin" readonly>
        </div>
        
        
        <div class="mb-3">
            <label for="Keterangan" class="form-label">Keterangan:</label>
            <textarea class="form-control" id="keterangan" rows="3" readonly></textarea>
        </div>
    </div>



    </main>   
</body>
</html>