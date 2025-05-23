<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pilih Metode Tambah Siswa</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: linear-gradient(to bottom, #b71c32 60%, #f8f9fa 40%);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .main {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 60px 20px;
            width: 100%;
        }

        h2 {
            color: white;
            margin-bottom: 50px;
            font-size: 24px;
        }

        .card-container {
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

        .btn {
            display: inline-block;
            margin-top: 40px;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: 500;
            color: white;
            background-color: #b71c32;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.2s;
        }

        .btn:hover {
            background-color: #8a1728;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="main">
        <h2>Pilih Metode Penambahan Data Siswa</h2>
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
        <a href="sidebar.php" class="btn">Kembali</a>
    </div>
</body>
</html>
