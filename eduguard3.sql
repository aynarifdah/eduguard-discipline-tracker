-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2025 at 01:03 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eduguard3`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Pakaian Seragam Sekolah Dan Perangkatnya'),
(2, 'Kerapihan Rambut'),
(3, 'Perhiasan'),
(4, 'Merokok'),
(5, 'Minuman Keras/Alkohol/Judi'),
(6, 'Perkelahian/Keributan'),
(7, 'Narkoba'),
(8, 'Perbuatan Asusila'),
(9, 'Pencurian / Kejahatan / Pemalakan'),
(10, 'Alat Komunikasi'),
(11, 'UU ITE'),
(12, 'Pembinaan Akhlak');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `id_pelanggaran` int NOT NULL,
  `id_kategori` int NOT NULL,
  `jenis_pelanggaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `poin_pelanggaran` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pelanggaran`
--

INSERT INTO `pelanggaran` (`id_pelanggaran`, `id_kategori`, `jenis_pelanggaran`, `poin_pelanggaran`) VALUES
(1, 1, 'Tidak menggunakan seragam sesuai hari', 10),
(2, 1, 'Tidak Menggunakan Topi/ bukan topi sekolah', 10),
(3, 1, 'tidak menggunakan sepatu full hitam', 10),
(4, 1, 'memakai sandal ke sekolah tanpa ada izin yang jelas', 10),
(5, 1, 'siswi non-hijab rambut diikat rapi', 20),
(6, 1, 'Atribut tidak lengkap', 10),
(7, 1, 'siswi wajib mengenakan rok panjang span (tidak ketat/ rempel)', 10),
(8, 2, 'siswa putra rambut harus rapi sesuai atura (ukuran 2,2,1 cm)', 10),
(9, 3, 'menggunakan perhiasan berlebihan', 20),
(16, 3, 'Siswa memakai perhiasan seperti cincin, kalung, giwang, dll', 10),
(17, 3, 'Membawa barang tidak berkaitan dengan pembelajaran', 10),
(18, 4, 'Membawa rokok, cerutu, bakau, korek api', 100),
(19, 4, 'Merokok saat memakai seragam sekolah', 100),
(20, 4, 'Merokok di lingkungan sekolah, walau hari libur atau kegiatan', 100),
(21, 5, 'Membawa/memberi/ membeli miras secara individu atau kelompok', 100),
(22, 5, 'Menggunakan atau menerima miras', 100),
(23, 5, 'Membawa kartu permainan atau kartu judi untuk dipakai atau tidak', 100),
(34, 6, 'Menimbulkan keributan/perkelahian', 100),
(35, 6, 'Tidak mengendalikan diri dari perkelahian', 100),
(36, 9, 'Mencuri barang orang lain / sekolah', 100),
(37, 9, 'Melakukan pemalakan, perampasan, pemaksaan', 100),
(38, 6, 'Tidak menyelesaikan masalah dengan damai', 100),
(39, 6, 'Melibatkan orang luar dalam konflik', 100),
(40, 6, 'Menghina/ melecehkan aparatur sekolah atau siswa lain', 100),
(41, 7, 'Membawa, memberi, membeli narkoba', 100),
(56, 9, 'Mencuri barang inventaris sekolah', 100),
(57, 10, 'Menggunakan HP saat pelajaran tanpa izin guru', 20),
(58, 10, 'Menyalakan HP saat kegiatan belajar berlangsung', 20),
(59, 10, 'Merekam/memotret tanpa izin di lingkungan sekolah', 30),
(60, 10, 'Menyalahgunakan alat komunikasi untuk tindakan negatif', 50),
(61, 11, 'Menyebarkan konten hoaks/ujaran kebencian via media sosial', 100),
(62, 11, 'Menggunakan akun palsu untuk menghina atau menyerang pihak lain', 100),
(63, 11, 'Menyebarkan konten pornografi/diskriminatif', 100),
(64, 11, 'Menyebarkan privasi teman/guru tanpa izin di media sosial', 100),
(65, 7, 'Membawa narkoba walau tidak digunakan', 100),
(66, 7, 'Pelanggaran narkoba dikenakan sanksi berat', 100),
(67, 8, 'Berpacaran / berperilaku asusila di dalam atau luar sekolah', 100),
(68, 8, 'Menyimpan / membawa / melihat media porno', 100),
(69, 12, 'Tidak berakhlak / sopan terhadap guru, orang tua, teman', 50),
(70, 12, 'Tidak taat terhadap kebijakan / peraturan sekolah', 50),
(71, 12, 'Tidak mengikuti kegiatan pembinaan akhlak & keagamaa', 50),
(72, 12, 'Menyebarkan ajaran/faham sesat', 100),
(73, 12, 'Mengganggu kerukunan hidup beragama / kepentingan umum', 100);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `kelas` int NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `nama_ortu` varchar(255) NOT NULL,
  `no_ortu` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nama_siswa`, `kelas`, `jurusan`, `nama_ortu`, `no_ortu`, `password`, `foto`) VALUES
(1, '18202501', 'Ade Arief Somadany', 11, 'PPLG 2', 'Hilda Rahmawati', '081277517751', 'siswa', NULL),
(2, '18202502', 'Agha Rizky Naufal', 11, 'PPLG 2', 'Hilda Rahmawati', '081277517751', 'siswa', NULL),
(3, '18202503', 'Ahmad Rahmadani Susilo', 11, 'PPLG 2', 'Hilda Rahmawati', '081277517751', 'siswa', NULL),
(4, '18202504', 'Aksay', 11, 'PPLG 2', 'Hilda Rahmawati', '081277517751', 'siswa', NULL),
(5, '18202505', 'Alfiansyah Bima Satria Ramadhan', 11, 'PPLG 2', 'Hilda Rahmawati', '081277517751', 'siswa', NULL),
(6, '18202506', 'Anandini Rafa Latifah', 11, 'PPLG 2', 'Hilda Rahmawati', '081277517751', 'siswa', NULL),
(8, '18202508', 'Bazil Rafid Abdilah', 11, 'PPLG 2', 'Hilda Rahmawati', '081277517751', 'siswa', NULL),
(9, '18202509', 'Dimas Fathan Saputra', 11, 'PPLG 2', 'Hilda Rahmawati', '081277517751', 'dims09', NULL),
(10, '9238749', 'Luke Andrew', 11, 'PH 1', 'andersen', '0239832', 'siswa', NULL),
(12, '0089762520', 'Xaviera agustina', 11, 'PPLG', 'safira', '927304723', 'siswa', NULL),
(17, '0089762520', 'Key Oriesa', 11, 'DKV', 'Budi selyo', '3535435', 'siswa', '6808fc620ef3f_chigo.png'),
(18, '123', 'Jihan aulia', 11, 'PPLG', 'Budi selyo', '5654', 'siswa', '6808fcc85f37f_ab2cf710-a886-4406-93e2-4b6bf5bcc02d.jfif'),
(21, '08320922', 'Keizaki', 11, 'AKL 2', 'Rion Kenzo', '02830283', 'siswa', '680cb78c66508_student.png'),
(22, '08008909', 'Mia Eleanor', 11, 'DKV 2', 'Rion Kenzo', '02830283', 'siswa', '680cb806c0954_student.png'),
(23, '0089962510', 'Krow Thornes', 11, 'TKRO 1', 'Rion Kenzo', '2830284', 'krw123', '680cb88874e4f_student.png'),
(24, '0089762577', 'Mikazuki Arion', 11, 'TBSM', 'Rion Harold', '67765765', 'siswa', '680a47a5b8c6a_download (16).jpeg'),
(31, '08829553', 'Vahira Nurfitria', 11, 'PPLG', 'Hermayanti', '089897', 'siswa', '680ce8e6b7f8b_2784410.png');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_bermasalah`
--

CREATE TABLE `siswa_bermasalah` (
  `id_masalah` int NOT NULL,
  `id_siswa` int NOT NULL,
  `id_pelanggaran` int NOT NULL,
  `id_admin` int DEFAULT NULL,
  `tgl_pelanggaran` date NOT NULL,
  `status_masalah` enum('langsung masuk','verifikasi') NOT NULL,
  `total_poin` int DEFAULT '0',
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `siswa_bermasalah`
--

INSERT INTO `siswa_bermasalah` (`id_masalah`, `id_siswa`, `id_pelanggaran`, `id_admin`, `tgl_pelanggaran`, `status_masalah`, `total_poin`, `keterangan`) VALUES
(2, 5, 3, 1, '2025-03-06', 'langsung masuk', 10, NULL),
(3, 5, 3, 1, '2025-03-06', 'langsung masuk', 0, NULL),
(4, 8, 8, 1, '2025-03-06', 'langsung masuk', 10, NULL),
(5, 8, 8, 1, '2025-03-06', 'langsung masuk', 0, NULL),
(6, 6, 6, 1, '2025-03-06', 'langsung masuk', 10, NULL),
(7, 6, 6, 1, '2025-03-06', 'langsung masuk', 0, NULL),
(9, 1, 4, 4, '2025-03-09', 'langsung masuk', 10, NULL),
(10, 1, 4, 4, '2025-03-09', 'verifikasi', 10, NULL),
(11, 2, 8, 2, '2025-03-10', 'langsung masuk', 10, NULL),
(12, 6, 9, 1, '2025-03-10', 'langsung masuk', 20, 'make up tebal'),
(13, 1, 8, 1, '2025-03-11', 'langsung masuk', 10, 'rambut gondrong tidak sesuai aturan'),
(14, 3, 6, 4, '2025-03-09', 'verifikasi', 10, NULL),
(15, 2, 2, 1, '2025-03-11', 'langsung masuk', 10, 'tidak menggunakan topi saat upacara'),
(16, 4, 2, 4, '2025-03-12', 'verifikasi', 10, NULL),
(17, 2, 1, 4, '2025-03-11', 'verifikasi', 10, NULL),
(18, 10, 8, 1, '2025-04-15', 'langsung masuk', 10, 'rambutnya gondrong'),
(20, 12, 8, 1, '2025-04-04', 'langsung masuk', 10, 'tes'),
(21, 18, 9, 1, '2025-04-02', 'langsung masuk', 20, 'ketua geng'),
(23, 5, 8, 1, '2025-04-02', 'verifikasi', 10, NULL),
(24, 17, 3, 1, '2025-04-03', 'langsung masuk', 10, 'pakai sepatu putih'),
(25, 24, 6, 1, '2025-04-05', 'langsung masuk', 10, 'tidak memakai dasi'),
(26, 22, 35, 1, '2025-04-15', 'langsung masuk', 100, 'berantem dengan teman kelasnya'),
(27, 23, 57, 1, '2025-04-05', 'langsung masuk', 20, 'bermain game saat jam pelajaran'),
(40, 31, 3, 1, '2025-04-09', 'langsung masuk', 10, 'pakai sepatu putih'),
(41, 21, 57, 4, '2025-04-11', 'verifikasi', 20, NULL),
(42, 18, 41, 1, '2025-04-03', 'verifikasi', 100, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_admin` int NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','guru') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_admin`, `nip`, `nama`, `username`, `password`, `role`) VALUES
(1, '32760111', 'Hermini Susetyawati, S.Pd., MM', 'admin_hermin', 'her123', 'admin'),
(2, '32760222', 'Heri Sri Purnomo, S.Kom', 'admin_heri', 'heri222', 'admin'),
(3, '32760333', 'Yusuf Rahmadi, S.Pd', 'admin_ysf', 'ysf12345', 'admin'),
(4, '32760444', 'Hilda Rahmawati', 'guru_hilda', 'hilda123', 'guru'),
(5, '3276055555', 'nishkala amerta', 'guru_kala', 'kal123456', 'guru'),
(6, '3276066666', 'arabella shevara', 'guru_ara', 'rara122', 'guru'),
(7, '3276077777', 'agaskar mavera', 'admin_askar', 'askar111', 'admin'),
(8, '3276077777', 'agaskar mavera', 'admin_askar', 'askar111', 'admin'),
(9, '3276088888', 'mavleen', 'admin_mav', 'mav222', 'admin'),
(12, '1010101010', 'niyah', 'niyahyah', '$2y$10$mOlnc/zC.jbUFJY3/HC6Se5kANN5Y/fg.af171D6bJss4ciXNoE6q', 'admin'),
(13, '101010101010', 'g', 'b', '$2y$10$T22EbKtNiVU/cl05ouRkj.kNyGGnYjZ5nbfVuxHTpO7nHEB1y64py', 'admin'),
(14, '1010101010', 'm', 'n', '$2y$10$1Z5CH4lCZnXGWNEuzdmKrOjpBvQzj7WzqMhP4ioKDqCGd26qAkoGa', 'admin'),
(15, '101010101010', 'b', 'n', 'm', 'admin'),
(16, '2222222222', 'rosidin', 'admin_rosidin', 'ros121212', 'admin'),
(17, '9999999999', 'anya', 'guru_anya', 'an1221', 'admin'),
(18, '1234567812', 'asdf', 'admin_abc', 'asd', 'admin'),
(20, '12345678910', 'Ayna Rifdah', 'admin_ayna', 'ayna', 'admin'),
(21, '1010101010', 'andrew delucas', 'guru_lucas', '123', 'guru');

-- --------------------------------------------------------

--
-- Table structure for table `verifikasi`
--

CREATE TABLE `verifikasi` (
  `id_catatan` int NOT NULL,
  `id_siswa` int NOT NULL,
  `id_pelanggaran` int NOT NULL,
  `id_admin` int NOT NULL,
  `tgl_pelanggaran` date NOT NULL,
  `status_verifikasi` enum('terverifikasi','belum diverifikasi') NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `verifikasi`
--

INSERT INTO `verifikasi` (`id_catatan`, `id_siswa`, `id_pelanggaran`, `id_admin`, `tgl_pelanggaran`, `status_verifikasi`, `keterangan`) VALUES
(17, 31, 34, 4, '2025-04-02', 'belum diverifikasi', 'bertengkar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `siswa_bermasalah`
--
ALTER TABLE `siswa_bermasalah`
  ADD PRIMARY KEY (`id_masalah`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_pelanggaran` (`id_pelanggaran`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `verifikasi`
--
ALTER TABLE `verifikasi`
  ADD PRIMARY KEY (`id_catatan`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_pelanggaran` (`id_pelanggaran`),
  ADD KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `id_pelanggaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `siswa_bermasalah`
--
ALTER TABLE `siswa_bermasalah`
  MODIFY `id_masalah` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `verifikasi`
--
ALTER TABLE `verifikasi`
  MODIFY `id_catatan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD CONSTRAINT `pelanggaran_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE;

--
-- Constraints for table `siswa_bermasalah`
--
ALTER TABLE `siswa_bermasalah`
  ADD CONSTRAINT `siswa_bermasalah_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `siswa_bermasalah_ibfk_2` FOREIGN KEY (`id_pelanggaran`) REFERENCES `pelanggaran` (`id_pelanggaran`),
  ADD CONSTRAINT `siswa_bermasalah_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `user` (`id_admin`);

--
-- Constraints for table `verifikasi`
--
ALTER TABLE `verifikasi`
  ADD CONSTRAINT `verifikasi_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE,
  ADD CONSTRAINT `verifikasi_ibfk_2` FOREIGN KEY (`id_pelanggaran`) REFERENCES `pelanggaran` (`id_pelanggaran`) ON DELETE CASCADE,
  ADD CONSTRAINT `verifikasi_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `user` (`id_admin`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
