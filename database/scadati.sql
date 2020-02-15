-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2018 at 10:27 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scadati`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `notelfon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`username`, `password`, `nama`, `notelfon`) VALUES
('admin', 'scadati', 'Admin Scada TI', '081291886170'),
('riki', 'riki', 'riki Nur Afifuddin', '081291886170'),
('user', 'user', 'General User', '081');

-- --------------------------------------------------------

--
-- Table structure for table `peripheral_barat`
--

CREATE TABLE `peripheral_barat` (
  `id` int(11) NOT NULL,
  `peralatan` varchar(50) NOT NULL,
  `down_time` datetime NOT NULL,
  `up_time` datetime NOT NULL,
  `errortime` time NOT NULL,
  `int_errortime` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peripheral_barat`
--

INSERT INTO `peripheral_barat` (`id`, `peralatan`, `down_time`, `up_time`, `errortime`, `int_errortime`, `keterangan`) VALUES
(1, 'Switch Metro 1', '2018-07-17 16:32:00', '2018-07-20 16:32:00', '03:00:00', 72, 'halo3d'),
(2, 'Global Positioning Sys', '2018-01-01 19:00:00', '2018-01-03 19:00:00', '02:00:00', 48, 'sad'),
(3, 'Switch Barat 2', '2018-11-01 19:19:00', '2018-11-02 04:19:00', '00:09:00', 9, 'you want me to');

-- --------------------------------------------------------

--
-- Table structure for table `peripheral_timur`
--

CREATE TABLE `peripheral_timur` (
  `id` int(11) NOT NULL,
  `peralatan` varchar(50) NOT NULL,
  `down_time` datetime NOT NULL,
  `up_time` datetime NOT NULL,
  `errortime` time NOT NULL,
  `int_errortime` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peripheral_timur`
--

INSERT INTO `peripheral_timur` (`id`, `peralatan`, `down_time`, `up_time`, `errortime`, `int_errortime`, `keterangan`) VALUES
(2, 'Terminal Server Timur 2', '2018-07-17 17:08:00', '2018-07-18 17:08:00', '01:00:00', 24, 'girls you are so suck');

-- --------------------------------------------------------

--
-- Table structure for table `redudant_barat`
--

CREATE TABLE `redudant_barat` (
  `id` int(11) NOT NULL,
  `peralatan` varchar(50) NOT NULL,
  `down_time` datetime NOT NULL,
  `up_time` datetime NOT NULL,
  `errortime` time NOT NULL,
  `int_errortime` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `redudant_barat`
--

INSERT INTO `redudant_barat` (`id`, `peralatan`, `down_time`, `up_time`, `errortime`, `int_errortime`, `keterangan`) VALUES
(4, 'Server 2', '2018-07-17 15:49:00', '2018-07-18 15:49:00', '01:00:00', 24, 'redo'),
(7, 'Server 2', '2018-02-19 18:44:00', '2018-02-22 18:44:00', '03:00:00', 72, 'tersangka1'),
(8, 'Server 1', '2018-04-04 18:58:00', '2018-04-05 18:58:00', '01:00:00', 24, 'tea'),
(9, 'Server 1', '2018-07-19 19:10:00', '2018-07-22 19:10:00', '03:00:00', 72, 'how much'),
(10, 'Historical 1', '2018-06-13 19:08:00', '2018-06-15 19:09:00', '02:00:01', 48, 'call'),
(11, 'Server 2', '2018-08-08 19:09:00', '2018-08-09 19:09:00', '01:00:00', 24, 'dont matter'),
(12, 'Historical 2', '2018-09-14 19:11:00', '2018-09-10 19:11:00', '04:00:00', 96, 'to say good bey'),
(13, 'Server 1', '2018-10-18 19:18:00', '2018-10-19 19:18:00', '01:00:00', 24, 'turn around'),
(14, 'Server 2', '2018-12-01 19:20:00', '2018-12-01 21:20:00', '00:02:00', 2, 'to many time before'),
(15, 'Server 1', '2019-02-01 13:56:00', '2019-02-08 13:56:00', '07:00:00', 168, 'tes'),
(16, 'Server 1', '2017-12-13 23:18:00', '2017-12-28 23:19:00', '15:00:01', 360, 'a'),
(17, 'Historical 1', '2017-11-01 07:31:00', '2017-11-03 07:31:00', '02:00:00', 48, 'tes'),
(18, 'Server 2', '2017-10-11 07:33:00', '2017-10-14 07:33:00', '03:00:00', 72, 'i'),
(19, 'Pilih Peralatan', '2017-09-01 08:16:00', '2017-09-04 08:16:00', '03:00:00', 72, 'a'),
(20, 'Server 1', '2018-08-05 18:38:00', '2018-08-07 18:38:00', '02:00:00', 48, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `redudant_timur`
--

CREATE TABLE `redudant_timur` (
  `id` int(11) NOT NULL,
  `peralatan` varchar(50) NOT NULL,
  `down_time` datetime NOT NULL,
  `up_time` datetime NOT NULL,
  `errortime` time NOT NULL,
  `int_errortime` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `redudant_timur`
--

INSERT INTO `redudant_timur` (`id`, `peralatan`, `down_time`, `up_time`, `errortime`, `int_errortime`, `keterangan`) VALUES
(2, 'Historical 1', '2018-07-17 12:15:00', '2018-07-17 15:15:00', '00:03:00', 3, 'taraa'),
(3, 'Server 2', '2018-07-17 16:49:00', '2018-07-21 16:49:00', '04:00:00', 96, 'rewel'),
(4, 'Server 1', '2018-08-03 20:12:00', '2018-08-04 20:12:00', '01:00:00', 24, '1');

-- --------------------------------------------------------

--
-- Table structure for table `rekap_icon`
--

CREATE TABLE `rekap_icon` (
  `id` int(11) NOT NULL,
  `gardu_induk` varchar(50) NOT NULL,
  `down_time` datetime NOT NULL,
  `up_time` datetime NOT NULL,
  `errortime` time NOT NULL,
  `int_errortime` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekap_icon`
--

INSERT INTO `rekap_icon` (`id`, `gardu_induk`, `down_time`, `up_time`, `errortime`, `int_errortime`, `keterangan`) VALUES
(1, 'tes121', '2018-07-17 15:27:00', '2018-07-18 17:27:00', '01:02:00', 26, 'halo24');

-- --------------------------------------------------------

--
-- Table structure for table `rekap_nodin`
--

CREATE TABLE `rekap_nodin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `errortime` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekap_nodin`
--

INSERT INTO `rekap_nodin` (`id`, `nama`, `tanggal_awal`, `tanggal_akhir`, `errortime`, `keterangan`) VALUES
(1, 'tes12', '2018-07-17', '2018-07-20', 3, ''),
(2, 'new', '2018-08-03', '2018-08-04', 1, 'update'),
(3, 'halo 123', '2018-08-06', '2018-08-07', 1, 'update');

-- --------------------------------------------------------

--
-- Table structure for table `standalone_barat`
--

CREATE TABLE `standalone_barat` (
  `id` int(11) NOT NULL,
  `peralatan` varchar(50) NOT NULL,
  `down_time` datetime NOT NULL,
  `up_time` datetime NOT NULL,
  `errortime` time NOT NULL,
  `int_errortime` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `standalone_barat`
--

INSERT INTO `standalone_barat` (`id`, `peralatan`, `down_time`, `up_time`, `errortime`, `int_errortime`, `keterangan`) VALUES
(3, 'WorkStation Metro 3', '2018-07-19 16:18:00', '2018-07-20 16:18:00', '01:00:00', 24, 'taraa ws'),
(4, 'Offline DB', '2018-03-01 18:46:00', '2018-03-02 18:46:00', '01:00:00', 24, 'rwwe');

-- --------------------------------------------------------

--
-- Table structure for table `standalone_timur`
--

CREATE TABLE `standalone_timur` (
  `id` int(11) NOT NULL,
  `peralatan` varchar(50) NOT NULL,
  `down_time` datetime NOT NULL,
  `up_time` datetime NOT NULL,
  `errortime` time NOT NULL,
  `int_errortime` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `standalone_timur`
--

INSERT INTO `standalone_timur` (`id`, `peralatan`, `down_time`, `up_time`, `errortime`, `int_errortime`, `keterangan`) VALUES
(5, 'WorkStation Timur 2', '2018-07-17 16:34:00', '2018-07-19 16:34:00', '02:00:00', 48, 'haha'),
(6, 'WorkStation Timur 3', '2018-07-17 16:56:00', '2018-07-19 19:56:00', '02:03:00', 51, 'from here dude'),
(7, 'Offline DB', '2018-08-20 19:39:00', '2018-08-24 19:39:00', '04:00:00', 96, 'dar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `peripheral_barat`
--
ALTER TABLE `peripheral_barat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peripheral_timur`
--
ALTER TABLE `peripheral_timur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redudant_barat`
--
ALTER TABLE `redudant_barat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redudant_timur`
--
ALTER TABLE `redudant_timur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekap_icon`
--
ALTER TABLE `rekap_icon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekap_nodin`
--
ALTER TABLE `rekap_nodin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standalone_barat`
--
ALTER TABLE `standalone_barat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standalone_timur`
--
ALTER TABLE `standalone_timur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peripheral_barat`
--
ALTER TABLE `peripheral_barat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peripheral_timur`
--
ALTER TABLE `peripheral_timur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `redudant_barat`
--
ALTER TABLE `redudant_barat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `redudant_timur`
--
ALTER TABLE `redudant_timur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rekap_icon`
--
ALTER TABLE `rekap_icon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rekap_nodin`
--
ALTER TABLE `rekap_nodin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `standalone_barat`
--
ALTER TABLE `standalone_barat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `standalone_timur`
--
ALTER TABLE `standalone_timur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
