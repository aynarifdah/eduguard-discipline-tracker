
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
    <h2 class="mb-4 text-center">Form Add Admin / Guru</h2>

    <form action="../../actionaddadmin.php" method="POST">
    
        <div class="mb-3">
            <label for="nip" class="form-label">NIP:</label>
            <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukan NIP">
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap:</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="text" class="form-control" id="password" name="password" placeholder="Masukan Password">
        </div>
       
        <label for="role" class="form-label">Role:</label>        
        <div class="form-check mb-2">
            <select id="role" name="role" required>
                <option value="admin">Admin</option>
                <option value="guru">Guru</option>
            </select>
            </label>
          </div>
        
        <button type="submit" class="btn btn-laporan">ADD</button>
    
    </form>
    </div>
    </div>
</main>
   
</body>
</html>

</body>
</html>