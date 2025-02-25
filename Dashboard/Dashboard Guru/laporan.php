<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Laporan Pelanggaran</title>
    <link rel="stylesheet" href="../css-js/dashboard.css">
</head>
<style>
    .card:hover {
  transform: translateY(-10px) scale(1.02);
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}
</style>
<body>
    <main class=" main-content">
    <div class="mt-5">
    <div class="card">
              
    <h2 class="mb-4 text-center">Form Laporan Pelanggaran</h2>
    <form>
        

        <div class="mb-3">
            <label for="nisn" class="form-label">NISN:</label>
            <input type="text" class="form-control" id="nisn" placeholder="Masukan Nisn">
        </div>

        <div class="mb-3">
            <label for="namasiswa" class="form-label">Nama:</label>
            <input type="text" class="form-control" id="namasiswa" placeholder="Masukan Nama">
        </div>
        <div class="mb-3">
            <label for="Kelas" class="form-label">Kelas:</label>
            <input type="text" class="form-control" id="Kelas" placeholder="Masukan Kelas">
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal:</label>
            <input type="date" class="form-control" id="tanggal" placeholder="Masukan Tanggal">
        </div>
          
          
         
          <label class="mb-2" for="kategori">Kategori:</label>
          <select id="kategori" name="kategori" class="form-select mb-3" aria-label="Default select example" required>
              <option value="">-- Pilih Kategori --</option>
              <option value="pakaian">Pakaian Seragam dan Perangkatnya</option>
              <option value="kerapian">Kerapian</option>
              <option value="sikap">Sikap dan Perilaku</option>
            </select>

        <label class="mb-2" for="pasal">Pasal:</label>
        <select id="pasal" name="pasal" class="form-select mb-3" aria-label="Default select example" required>
            <option value="">-- Pilih Pasal --</option>
        </select>

        <label class="mb-2" for="ayat">Ayat:</label>
        <select id="ayat" name="ayat" class="form-select mb-3" aria-label="Default select example" required>
            <option value="">-- Pilih Ayat --</option>
        </select>
        
      
        <div class="mb-3">
            <label for="poin" class="form-label ">Poin:</label>
            <input type="text" class="form-control" id="poin" name="poin" readonly>
        </div>
          
        
        <div class="mb-3">
          <label for="Keterangan" class="form-label">Keterangan:</label>
          <textarea class="form-control" id="keterangan" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-laporan">Kirim</button>
    
    </form>
    </div>
    </div>
</main>
   
</body>
</html>
