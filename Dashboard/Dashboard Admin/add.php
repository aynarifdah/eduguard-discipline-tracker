<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pilih Metode Tambah Siswa</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 30px;
        }

        .card-container {
            padding-top: 20px;
            display: flex;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
        }

        .card {
            background-color: #ffffff;
            padding: 30px 20px;
            width: 250px;
            height: 200px;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            text-decoration: none;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
            padding-bottom: 25px;
        }

        input[type="file"] {
            display: none;
        }

        form {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pilih Metode Penambahan Data Siswa</h2><br>
        <div class="card-container">
            <a href="add_siswa.php" class="card">
                <h1>➕</h1>
                <div class="card-title">Tambah Manual</div>
            </a>
            <form action="upload_siswa.php" method="POST" enctype="multipart/form-data">
                <label for="file_excel" class="card">
                    <h1>📁</h1>
                    <div class="card-title">Upload File</div>
                </label>
                <input type="file" name="file_excel" id="file_excel" onchange="this.form.submit();">
                <input type="hidden" name="upload" value="true">
            </form>
        </div>
        <a href="sidebar.php" class="btn btn-td ">Kembali</a>
    </div>
</body>
</html>
