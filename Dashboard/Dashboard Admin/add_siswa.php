
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
    <td><a href="add.php" class="btn btn-td ">Kembali</a></td>
    </div>
    <br>
    <div class="card">
    <h2 class="mb-4 text-center">Form Add Siswa</h2>

    <form action="../../actionaddsiswa.php" method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="foto" class="form-label">Foto Siswa:</label>
            <input type="file" class="form-control" id="foto" name="foto" placeholder="Masukkan Foto" accept="img/*">
        </div>
        <div class="mb-3">
            <label for="nisn" class="form-label">NISN:</label>
            <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukkan Nisn">
        </div>

        <div class="mb-3">
            <label for="namasiswa" class="form-label">Nama Lengkap:</label>
            <br>
                    <small class="form-text text-danger">
                        * isi nama di awali huruf kapital
                    </small>
            <input type="text" class="form-control" id="namasiswa" name="namasiswa" placeholder="Masukkan Nama">
        </div>

        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas:</label>
            <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan kelas">
        </div>

        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan:</label>
            <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Masukkan jurusan">
        </div>

        <div class="mb-3">
            <label for="nama_ortu" class="form-label">Nama Ortu:</label>
            <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" placeholder="Masukkan nama wali murid">
        </div>

        <div class="mb-3">
            <label for="no_ortu" class="form-label">Nomor Telephone Ortu:</label>
            <input type="text" class="form-control" id="no_ortu" name="no_ortu" placeholder="Masukkan nomor wali murid">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Pasword:</label>
            <input type="text" class="form-control" id="password" name="password" placeholder="Masukkan password">
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