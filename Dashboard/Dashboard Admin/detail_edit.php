
<body>
    <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit</title>
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
    <h2 class="mb-4 text-center">Form Edit</h2>
    <form>
        

        <div class="mb-3">
            <label for="nisn" class="form-label">NISN:</label>
            <input type="text" class="form-control" id="nisn" >
        </div>

        <div class="mb-3">
            <label for="namasiswa" class="form-label">Nama Lengkap:</label>
            <input type="text" class="form-control" id="namasiswa" >
        </div>

        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas:</label>
            <input type="text" class="form-control" id="kelas" >
        </div>
        
        <button type="button" class="btn btn-td" style="padding: 5px 30px;">Edit</button>
    
    </form>
    </div>
    </div>
</main>
   
</body>
</html>

</body>
</html>