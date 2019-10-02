-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 01, 2019 at 10:31 PM
-- Server version: 5.7.19
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_alumni`
--

CREATE TABLE `tb_alumni` (
  `id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `id_dept` int(3) NOT NULL,
  `graduation` varchar(4) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_alumni`
--

INSERT INTO `tb_alumni` (`id`, `name`, `id_dept`, `graduation`, `phone`, `email`, `address`) VALUES
(1, 'Yusuf Lukman Hakim', 2, '2016', '0857812399', 'yusufelha@gmail.com', 'Wonotirto, Bulu, Temanggung 56253'),
(2, 'Agus Alfian', 2, '2015', '081567456990', 'agusmaisyur@gmail.com', 'Tegalrejo, Bulu Temanggung'),
(3, 'Catra Andika Ramadhani', 1, '2019', '085899455104', 'ctrndk@gmail.com', 'Wonotirto Bulu Temanggung'),
(4, 'Choerul Akmam', 2, '2014', '085228541115', 'choerulakmam@gmail.com', 'Palembang Sumatera'),
(5, 'Fuad Ahmad Endaryanto', 1, '2019', '08545612321', 'mrjemad@gmail.com', 'Purwanegara Banjarnegara'),
(6, 'Dimas Mandalin Putra', 2, '2017', '085227569896', 'dimasmandalin23@gmail.com', 'Selomerto Wonosobo'),
(7, 'Hani Faturafiqoh', 1, '2019', '085229123321', 'hanicue@gmail.com', 'Kalikajar Kertek Wonosobo'),
(8, 'Yoga', 1, '2020', '0837823923', 'yogathok@gmail.com', 'Pelosok Wonosobo'),
(9, 'Uswatun Khasanah', 2, '2017', '0836299322', 'uswatunlike@gmail.com', 'Simpang Lima Semarang'),
(10, 'Gandung Puasto', 2, '2015', '08734788734', 'gandung@ymail.com', 'Sana kae Wonosobo'),
(11, 'Edi Purnomo', 1, '2021', '085345678998', 'ediedan@gmail.com', 'Denpasar Bali'),
(12, 'Ari Wahyudi', 1, '2011', '085456123789', 'ariwahyudi@cyber4rt.com', 'Sidoarjo Surabaya'),
(13, 'Wahyu Hidayat', 2, '2016', '8512345677', 'wahyu@123.net', 'Klaten Jawa Tengah'),
(15, 'Badari', 2, '2018', '851245677', 'nampungcoba666@gmail.com', 'Kutai Kalimantan Timur');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dept`
--

CREATE TABLE `tb_dept` (
  `id_dept` int(3) NOT NULL,
  `code` varchar(5) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dept`
--

INSERT INTO `tb_dept` (`id_dept`, `code`, `name`) VALUES
(1, 'FIK', 'Fakultas Ilmu dan Komputer'),
(2, 'FE', 'Fakultas Ekonomi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_alumni`
--
ALTER TABLE `tb_alumni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dept` (`id_dept`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `tb_dept`
--
ALTER TABLE `tb_dept`
  ADD PRIMARY KEY (`id_dept`),
  ADD KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_alumni`
--
ALTER TABLE `tb_alumni`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_dept`
--
ALTER TABLE `tb_dept`
  MODIFY `id_dept` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_alumni`
--
ALTER TABLE `tb_alumni`
  ADD CONSTRAINT `tb_alumni_ibfk_1` FOREIGN KEY (`id_dept`) REFERENCES `tb_dept` (`id_dept`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
