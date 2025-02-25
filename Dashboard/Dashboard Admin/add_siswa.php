
<body>
    <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Laporan Pelanggaran</title>
    <link rel="stylesheet" href="css-js/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="../css-js/dashboard.css" rel="stylesheet">
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
</style>
<body>
    <main class="col-md-9 col-lg-10 main-content">

    <div class="md-5">
    <td><a href="sidebar.php" class="btn btn-td ">Kembali</a></td>
    </div>
    <br>
    <div class="card">
    <h2 class="mb-4 text-center">Form Add Siswa</h2>
    <form>
        

        <div class="mb-3">
            <label for="nisn" class="form-label">NISN:</label>
            <input type="text" class="form-control" id="nisn" placeholder="Masukkan Nisn">
        </div>

        <div class="mb-3">
            <label for="namasiswa" class="form-label">Nama Lengkap:</label>
            <input type="text" class="form-control" id="namasiswa" placeholder="Masukkan Nama">
        </div>

        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas:</label>
            <input type="text" class="form-control" id="kelas" placeholder="Masukkan kelas">
        </div>

        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan:</label>
            <input type="text" class="form-control" id="jurusan" placeholder="Masukkan kelas">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Pasword:</label>
            <input type="text" class="form-control" id="jurusan" placeholder="Masukkan kelas">
        </div>
        
        <button type="submit" class="btn btn-laporan">Add</button>
    
    </form>
    </div>
    </div>
</main>
   
</body>
</html>

</body>
</html>