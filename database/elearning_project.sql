-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2024 at 07:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(7) NOT NULL,
  `nama_guru` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `nama_guru`) VALUES
('guru001', 'guru 1'),
('guru002', 'guru 2');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `jurusan` varchar(30) NOT NULL,
  `kode_jurusan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`jurusan`, `kode_jurusan`) VALUES
('AGAMA', 'agama'),
('BAHASA', 'bahasa'),
('IPS', 'ips'),
('MIPA', 'mipa');

-- --------------------------------------------------------

--
-- Table structure for table `kelas2`
--

CREATE TABLE `kelas2` (
  `kode_kelas` varchar(10) NOT NULL,
  `kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas2`
--

INSERT INTO `kelas2` (`kode_kelas`, `kelas`) VALUES
('x10', 'X'),
('x11', 'XI'),
('x12', 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `matapel`
--

CREATE TABLE `matapel` (
  `mapel` varchar(30) NOT NULL,
  `kode_mapel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matapel`
--

INSERT INTO `matapel` (`mapel`, `kode_mapel`) VALUES
('mapel  1', 'mapel1'),
('mapel 10', 'mapel10'),
('mapel 2', 'mapel2'),
('mapel 3', 'mapel3'),
('mapel 4', 'mapel4'),
('mapel 5', 'mapel5'),
('mapel 6', 'mapel6'),
('mapel 7', 'mapel7'),
('mapel 8', 'mapel8'),
('mapel 9', 'mapel9');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `kode_mapel` varchar(10) NOT NULL,
  `mapel` varchar(30) NOT NULL,
  `materi` varchar(10) NOT NULL,
  `id` int(11) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`kode_mapel`, `mapel`, `materi`, `id`, `jurusan`, `kelas`) VALUES
('mmx1', 'mmx1', '5qllaamY40', 1, 'mipa', 'x10'),
('mapel10', 'mapel10', 'MTuDJGsOQn', 2, 'bahasa', 'x12'),
('mapel2', 'mapel2', 'PZGF6epDl4', 3, 'agama', 'x10');

-- --------------------------------------------------------

--
-- Table structure for table `password_guru`
--

CREATE TABLE `password_guru` (
  `current_password` varchar(6) NOT NULL,
  `new_password` varchar(6) NOT NULL,
  `repeat_new_password` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `potoprofil_guru`
--

CREATE TABLE `potoprofil_guru` (
  `Photo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profil_guru`
--

CREATE TABLE `profil_guru` (
  `username` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `poto_profil` varchar(10) NOT NULL,
  `password` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sipaling`
--

CREATE TABLE `sipaling` (
  `id` int(11) NOT NULL,
  `kode_mapel` varchar(10) NOT NULL,
  `mapel` varchar(30) NOT NULL,
  `nip` varchar(7) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `kode_jurusan` varchar(10) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `materi` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sipaling`
--

INSERT INTO `sipaling` (`id`, `kode_mapel`, `mapel`, `nip`, `nama_guru`, `kode_kelas`, `kelas`, `kode_jurusan`, `jurusan`, `materi`) VALUES
(1, 'mapel3', 'mapel 3', 'guru001', 'guru 1', 'x10', 'X', 'mipa', 'MIPA', ''),
(6, 'mapel10', 'mapel10', '', '', '', 'x10', '', 'agama', 'k9F3KBbUILfRI'),
(7, 'mapel3', 'mapel3', '', '', '', 'x10', '', 'agama', 'R2xBRFeZGoAxI');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` int(7) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `kelas` int(11) NOT NULL,
  `jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userguru`
--

CREATE TABLE `userguru` (
  `usernameguru` bigint(16) NOT NULL,
  `passwordguru` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userguru`
--

INSERT INTO `userguru` (`usernameguru`, `passwordguru`) VALUES
(12345678, '$1$8lh/KWfx$H/.90.kSAxW2VmPp4TgG8.');

-- --------------------------------------------------------

--
-- Table structure for table `usersiswa`
--

CREATE TABLE `usersiswa` (
  `usernamesiswa` int(10) NOT NULL,
  `passwordsiswa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usersiswa`
--

INSERT INTO `usersiswa` (`usernamesiswa`, `passwordsiswa`) VALUES
(2345678, '$1$U4qmgCwE$JaMUxHS64DE3sNVSy.o9U/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kode_jurusan`);

--
-- Indexes for table `kelas2`
--
ALTER TABLE `kelas2`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indexes for table `matapel`
--
ALTER TABLE `matapel`
  ADD PRIMARY KEY (`kode_mapel`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sipaling`
--
ALTER TABLE `sipaling`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `kode_jurusan` (`kode_jurusan`),
  ADD KEY `nip` (`nip`),
  ADD KEY `kode_mapel` (`kode_mapel`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `userguru`
--
ALTER TABLE `userguru`
  ADD PRIMARY KEY (`usernameguru`);

--
-- Indexes for table `usersiswa`
--
ALTER TABLE `usersiswa`
  ADD PRIMARY KEY (`usernamesiswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sipaling`
--
ALTER TABLE `sipaling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
