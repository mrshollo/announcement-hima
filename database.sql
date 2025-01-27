-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 27 Jan 2025 pada 07.02
-- Versi server: 10.6.20-MariaDB-cll-lve
-- Versi PHP: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pacific5_bl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `staff_selection`
--

CREATE TABLE `staff_selection` (
  `id` int(11) NOT NULL,
  `staff_id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `class` varchar(250) NOT NULL,
  `status` enum('Accepted','Rejected') NOT NULL,
  `ay` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `at` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `staff_selection`
--

INSERT INTO `staff_selection` (`id`, `staff_id`, `name`, `class`, `status`, `ay`, `at`, `created_at`) VALUES
(1, '23232323', 'Marshep Ollo', 'SISTEL 3C', 'Accepted', 'Kepala', 'Komisi III', '2025-01-26 23:47:17'),
(2, '24242424', 'Nama Kamu', 'Sistel 1C', 'Accepted', 'Staff', 'Komisi III', '2025-01-26 23:47:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `staff_selection`
--
ALTER TABLE `staff_selection`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `staff_selection`
--
ALTER TABLE `staff_selection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
