-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2019 at 06:57 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soundcloud`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id_artist` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id_genre`, `genre`) VALUES
(1, 'POP'),
(2, 'ROCK'),
(3, 'JAZZ');

-- --------------------------------------------------------

--
-- Table structure for table `leveluser`
--

CREATE TABLE `leveluser` (
  `id` int(11) NOT NULL,
  `level` int(1) NOT NULL,
  `nama_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leveluser`
--

INSERT INTO `leveluser` (`id`, `level`, `nama_level`) VALUES
(1, 1, 'Admin'),
(2, 2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(25) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` int(1) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nama`, `alamat`, `no_telp`, `username`, `password`, `email`, `level`) VALUES
(1, 'Nurhidayat Aldila', 'Perum. Bumi Mangliawan', '082137899966', 'dayat', '123456', 'nurhidayat.aldila@gmail.com', 1),
(2, 'Anita', 'Perum. Bumi Mangliawan', '081252537725', 'anita', '123456', 'anita@gmail.com', 2),
(8, 'Tencent', 'JL. Panjaitan Dalam', '0341147', 'tencent', '123456', 'nurhidayat.aldila2@gmail.com', 2),
(9, 'dini', 'malang', '+624567', 'dinitd', '666', 'dinitd25@gmail.com', 2),
(10, 'babas', 'mergan', '0341', 'bashori', '1312', 'babas12@gmail.com', 2),
(11, 'user', 'test', '123', 'user', 'test', 'nnn@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `id_song` int(11) NOT NULL,
  `id_genre` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name_song` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`id_song`, `id_genre`, `id_user`, `name_song`, `size`, `file`, `image`, `description`) VALUES
(6, 2, 2, 'DNA', 8980304, 'BTS - DNA.mp3', 'pics01.jpg', 'Tesss'),
(7, 3, 2, 'Send It', 7256640, 'Austin Mahone - Send It (Ft. Rich Homie Quan).mp3', 'cloud-e365a47.png', 'okwdw'),
(12, 1, 8, 'asdas', 3555455, 'AZMI - Pernah.mp3', 'php.jpg', 'asdas'),
(14, 1, 8, 'wdawd', 9584415, 'BTS MIC Drop.mp3', 'android.png', 'dwada'),
(15, 1, 2, 'Blood Sweat Tears', 3535583, 'BTS - Blood Sweat   Tears.mp3', '10952649_447085342116942_1282973546_n.jpg', 'Tes'),
(16, 3, 9, '', 3555455, 'AZMI - Pernah.mp3', 'Screenshot_20190201-005239.jpg', ''),
(17, 1, 11, 'Dope', 3856698, 'BTS - Dope.mp3', 'logo_poltek.png', 'Tes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id_artist`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `leveluser`
--
ALTER TABLE `leveluser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`id_song`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id_artist` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leveluser`
--
ALTER TABLE `leveluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
  MODIFY `id_song` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
