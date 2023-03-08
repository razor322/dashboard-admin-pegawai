-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Mar 2023 pada 03.38
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pegawai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kantor`
--

CREATE TABLE `kantor` (
  `kantor_id` int(11) NOT NULL,
  `kantor_nama` varchar(50) NOT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `lokasi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kantor`
--

INSERT INTO `kantor` (`kantor_id`, `kantor_nama`, `manager_id`, `lokasi_id`) VALUES
(10, 'Executive', 100, 100),
(20, 'Marketing', 101, 100),
(30, 'Administration', 101, 100),
(40, 'Shipping', 101, 104),
(50, 'Finance', 101, 102),
(60, 'Sales', 101, 101),
(70, 'IT', 101, 103);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id` varchar(30) NOT NULL,
  `nama_kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id`, `nama_kota`) VALUES
('ACH', 'Aceh'),
('BDG', 'Bandung'),
('BLI', 'Bali'),
('BTM', 'Batam'),
('JKT', 'Jakarta'),
('MDN', 'Medan'),
('PDG', 'Padang'),
('PKU', 'Pekanbaru'),
('PLG', 'Palembang'),
('PLM', 'Palembang'),
('PNK', 'Pontianak'),
('YOG', 'Yogyakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `kota_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id`, `alamat`, `kode_pos`, `kota_id`) VALUES
(100, 'Jl. Cihampelas No.58 A, Tamansari, Kec. Bandung Wetan', 24454, 'BDG'),
(101, 'Apartemen Kalibata City, Tower Borneo, Jl. Kalibata Raya No. 1', 543666, 'JKT'),
(102, 'Pierpoint 39, Jl. Bangka Raya No. 39, Kemang, Jakarta Selatan', 24566, 'BLI'),
(103, 'Jl. Tebet Utara Dalam No. 1A, Tebet,', 8653, 'PNK'),
(104, 'Green Pramuka Square, Lantai Ground Jl. Jenderal Ahmad Yani, Cempaka Putih', 54422, 'PKU'),
(105, 'Jl. Boulevard Raya Blok FV1 No. 16', 54432, 'MDN'),
(107, 'Jl. Balai Pustaka Timur No. 34A', 5422, 'PDG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jekel` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `pekerjaan_id` varchar(11) NOT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `kantor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `email`, `tgl_lahir`, `jekel`, `alamat`, `pekerjaan_id`, `manager_id`, `kantor_id`) VALUES
(100, 'gybran', 'g', '2023-01-04', 'L', 'ada', 'AD_PRES', NULL, 10),
(101, 'Agus Budi', 'babyboss322@yahoo.com', '1982-03-26', 'L', 'padang', 'IT', 100, 10),
(102, 'Darmaji Hutasoit', 'banawa96@susanti.sch.id', '1984-04-07', 'L', 'Psr. Sudiarto No. 534, Pekalongan 97510, SumUt', 'FI_MGR', 100, 40),
(104, 'Natalia Rahimah', 'oyuniar@yahoo.co.id', '1984-04-15', 'P', 'Jr. Rajiman No. 163, Gorontalo 93111, DKI', 'AD_ASST', 101, 30),
(105, 'Radika Suwarno', 'paris38@puspasari.net', '1978-06-14', 'L', 'Dk. Bagas Pati No. 484, Manado 80348, SumSel', 'SA_MAN', 104, 20),
(106, 'Garang Tampubolon', 'rahimah.belinda@gmail.co.id', '1978-09-19', 'L', 'Jr. Halim No. 33, Lhokseumawe 90579, SumBar', 'IT', 102, 70),
(107, 'Yunita Wulandari ', 'utami.ratih@gmail.co.id', '1988-02-06', 'P', 'Ds. Bak Mandi No. 103, Padangpanjang 23618, SumUt', 'AD_ASST', 104, 30),
(108, 'Gara Sitorus', 'ellis75@yahoo.co.id', '1992-06-15', 'L', 'Gg. Antapani Lama No. 322, Binjai 30055, Jambi', 'FI_MGR', 107, 50),
(109, 'Elvina Lestari ', 'budiyanto.titin@yahoo.com', '1989-07-15', 'L', 'Ki. Gambang No. 782, Cimahi 62090, SulBar', 'AC_MGR', 105, 20),
(110, 'Giant White Knee', 'nauvalgybran@gmail.com', '1985-01-16', 'L', 'bandung', 'FI_MGR', 101, 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `job_id` varchar(11) NOT NULL,
  `job_nama` text NOT NULL,
  `job_gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pekerjaan`
--

INSERT INTO `pekerjaan` (`job_id`, `job_nama`, `job_gaji`) VALUES
('AC_MGR', 'Accounting Manager', 16000),
('AD_ASST', 'Administration Assistant', 6000),
('AD_PRES', 'President', 40000),
('AD_VP', 'Administration Vice President', 30000),
('FI_MGR', 'Finance Manage', 16000),
('IT', 'Programmer', 9000),
('SA_MAN', 'Sales Manager', 20000),
('ST_MAN', 'Stock Manager1', 85555);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', '$2y$10$iKRLj28jvj1RNHN5pPOaEe2bwQFEBCmxabzkpO3qL7e', 'admin'),
(11, 'admin1', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(12, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kantor`
--
ALTER TABLE `kantor`
  ADD PRIMARY KEY (`kantor_id`),
  ADD KEY `lokasi_id` (`lokasi_id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kota_id` (`kota_id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `kantor_id` (`kantor_id`),
  ADD KEY `pekerjaan_id` (`pekerjaan_id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indeks untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`job_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kantor`
--
ALTER TABLE `kantor`
  ADD CONSTRAINT `kantor_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `pegawai` (`id_pegawai`) ON UPDATE CASCADE,
  ADD CONSTRAINT `kantor_ibfk_2` FOREIGN KEY (`lokasi_id`) REFERENCES `lokasi` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD CONSTRAINT `lokasi_ibfk_1` FOREIGN KEY (`kota_id`) REFERENCES `kota` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_3` FOREIGN KEY (`kantor_id`) REFERENCES `kantor` (`kantor_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawai_ibfk_4` FOREIGN KEY (`pekerjaan_id`) REFERENCES `pekerjaan` (`job_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
