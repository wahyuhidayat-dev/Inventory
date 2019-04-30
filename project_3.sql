-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2019 at 04:29 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_3`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_akses`
--

CREATE TABLE `t_akses` (
  `id_akses` int(2) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `level_akes` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_akses`
--

INSERT INTO `t_akses` (`id_akses`, `jabatan`, `level_akes`) VALUES
(1, 'admin', 'admin'),
(2, 'gudang', 'gudang');

-- --------------------------------------------------------

--
-- Table structure for table `t_category`
--

CREATE TABLE `t_category` (
  `CAT_ID` int(2) NOT NULL,
  `CAT_NM` varchar(100) NOT NULL,
  `DIVISION` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_category`
--

INSERT INTO `t_category` (`CAT_ID`, `CAT_NM`, `DIVISION`) VALUES
(11, 'Biscuit/Snacks', 'GRO'),
(13, 'INTERIOR & BEDDING', 'NF'),
(14, 'Detergent', 'GRO'),
(15, 'Ladies & Children', 'NF'),
(16, 'Men & Shoes', 'NF'),
(17, 'Bulk Product', 'GRO'),
(19, 'H&B', 'GRO'),
(21, 'Sauces&Spices', 'GRO'),
(23, 'Drinks', 'GRO'),
(24, 'Milk', 'GRO'),
(31, 'Fish', 'FF'),
(32, 'Meat', 'FF'),
(34, 'Vegetables', 'FF'),
(35, 'Dairy & Frozen', 'GRO'),
(50, 'TV/Video', 'NF'),
(51, 'Kitchen', 'NF'),
(57, 'Bathroom', 'NF'),
(71, 'Stationary/Toys', 'NF'),
(80, 'Bakery', 'FF'),
(82, 'Ready To Eat', 'FF'),
(83, 'Local Fruits', 'FF'),
(84, 'Import Fruits', 'FF'),
(85, 'DIY', 'NF'),
(86, 'IT/GADGET', 'NF'),
(87, 'Small Appliance', 'NF'),
(88, 'BIG APPLIANCE', 'NF'),
(98, 'Donation', 'DONATION'),
(99, 'Miscellaneous', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `t_expired`
--

CREATE TABLE `t_expired` (
  `ID_TRANS` int(11) NOT NULL,
  `PROD_ID` int(11) NOT NULL,
  `CAT_NM` varchar(100) NOT NULL,
  `BARCODE` varchar(14) NOT NULL,
  `PROD_NM` varchar(255) NOT NULL,
  `STATUS` varchar(20) NOT NULL,
  `QTY` int(11) NOT NULL,
  `DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_expired`
--

INSERT INTO `t_expired` (`ID_TRANS`, `PROD_ID`, `CAT_NM`, `BARCODE`, `PROD_NM`, `STATUS`, `QTY`, `DATE`) VALUES
(1, 3, 'Drinks', '8996006858818', 'SOSRO TEH BOTOL TAWAR 350ML', 'Order Stop', 24, '2019-10-10'),
(2, 1, 'Sauces&Spices', '8999999026257', 'BANGO MANIS PEDAS 220ML', 'Normal', 12, '2019-04-10'),
(3, 1, 'Sauces&Spices', '8999999026257', 'BANGO MANIS PEDAS 220ML', 'Normal', 123, '2019-04-10'),
(4, 3, 'Drinks', '8996006858818', 'SOSRO TEH BOTOL TAWAR 350ML', 'Order Stop', 89, '2019-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `t_prod_master`
--

CREATE TABLE `t_prod_master` (
  `PROD_ID` int(11) NOT NULL,
  `VEN_NM` varchar(255) NOT NULL,
  `PROD_NM` varchar(255) NOT NULL,
  `L1_NM` varchar(30) NOT NULL,
  `STATUS` varchar(50) NOT NULL,
  `SPEC` varchar(30) NOT NULL,
  `SALE_PRC` varchar(12) NOT NULL,
  `BUY_PRC` varchar(12) NOT NULL,
  `BARCODE` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_prod_master`
--

INSERT INTO `t_prod_master` (`PROD_ID`, `VEN_NM`, `PROD_NM`, `L1_NM`, `STATUS`, `SPEC`, `SALE_PRC`, `BUY_PRC`, `BARCODE`) VALUES
(1, 'UNILEVER INDONESIA, PT', 'BANGO MANIS PEDAS 220ML', 'Sauces&Spices', 'Normal', '220ML', '13800', '10205', '8999999026257'),
(2, 'UNILEVER INDONESIA, PT', 'SUNSILK SHP BLACK SHINE 6X5ML', 'H&B', 'Normal', '6X5ML', '2475', '1839', '8999999708894'),
(3, 'UNILEVER INDONESIA. Tbk, PT', 'SOSRO TEH BOTOL TAWAR 350ML', 'Drinks', 'Order Stop', '350ML', '4900', '3219', '8996006858818');

-- --------------------------------------------------------

--
-- Table structure for table `t_return`
--

CREATE TABLE `t_return` (
  `ID_RETURN` varchar(11) NOT NULL,
  `PROD_ID` int(11) NOT NULL,
  `QTY_RETURN` int(11) NOT NULL,
  `DATE` date NOT NULL,
  `REASON` enum('PERSEDIAAN TIDAK TERJUAL','EXPIRED','BARANG CACAT','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_return`
--

INSERT INTO `t_return` (`ID_RETURN`, `PROD_ID`, `QTY_RETURN`, `DATE`, `REASON`) VALUES
('R000000003', 3, 24, '2019-01-31', 'EXPIRED'),
('R000000004', 3, 1, '2019-02-02', 'BARANG CACAT'),
('R000000005', 1, 12, '2019-02-02', 'PERSEDIAAN TIDAK TERJUAL');

-- --------------------------------------------------------

--
-- Table structure for table `t_stock_detail`
--

CREATE TABLE `t_stock_detail` (
  `PROD_ID` int(11) NOT NULL,
  `CAT_NM` varchar(100) NOT NULL,
  `BARCODE` varchar(14) NOT NULL,
  `PROD_NM` varchar(255) NOT NULL,
  `STATUS` varchar(20) NOT NULL,
  `STOCK_QTY` int(11) NOT NULL,
  `SALE_PRC` int(11) NOT NULL,
  `DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_stock_detail`
--

INSERT INTO `t_stock_detail` (`PROD_ID`, `CAT_NM`, `BARCODE`, `PROD_NM`, `STATUS`, `STOCK_QTY`, `SALE_PRC`, `DATE`) VALUES
(1, 'Sauces&Spices', '8999999026257', 'BANGO MANIS PEDAS 220ML', 'Normal', 88, 13800, '2019-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `t_stock_in`
--

CREATE TABLE `t_stock_in` (
  `PROD_ID` int(11) NOT NULL,
  `QTY_IN` int(11) NOT NULL,
  `DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_stock_in`
--

INSERT INTO `t_stock_in` (`PROD_ID`, `QTY_IN`, `DATE`) VALUES
(1, 24, '2019-01-31'),
(3, 12, '2019-02-02'),
(3, 12, '2019-02-02'),
(3, 12, '2019-02-02'),
(1, 24, '2019-02-02'),
(1, 120, '2019-02-02'),
(1, 120, '2019-02-02'),
(3, 123, '2019-02-02'),
(2, 12, '2019-02-02'),
(3, 123, '2019-02-02'),
(2, 24, '2019-02-02'),
(2, 24, '2019-02-02'),
(1, 123, '2019-02-02'),
(1, 12, '2019-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `t_stock_location`
--

CREATE TABLE `t_stock_location` (
  `ID_TRANS` int(11) NOT NULL,
  `PROD_ID` int(11) NOT NULL,
  `QTY` int(11) NOT NULL,
  `SEKTOR` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_stock_location`
--

INSERT INTO `t_stock_location` (`ID_TRANS`, `PROD_ID`, `QTY`, `SEKTOR`) VALUES
(1, 3, 123, '101001'),
(2, 1, 34, '102004');

-- --------------------------------------------------------

--
-- Table structure for table `t_stock_out`
--

CREATE TABLE `t_stock_out` (
  `ID_TRANS` varchar(15) NOT NULL,
  `PROD_ID` int(11) NOT NULL,
  `QTY_OUT` int(11) NOT NULL,
  `DATE` date NOT NULL,
  `REASON` enum('WASTE','UNRETURNABLE','EXPIRED') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_stock_out`
--

INSERT INTO `t_stock_out` (`ID_TRANS`, `PROD_ID`, `QTY_OUT`, `DATE`, `REASON`) VALUES
('OT000000001', 1, 12, '2019-02-01', 'WASTE'),
('OT000000002', 3, 24, '2019-02-02', ''),
('OT000000003', 3, 12, '2019-02-02', ''),
('OT000000004', 3, 24, '2019-02-02', ''),
('OT000000005', 1, 2, '2019-02-02', 'WASTE'),
('OT000000006', 1, 12, '2019-02-02', 'UNRETURNABLE'),
('OT000000007', 1, 2, '2019-02-02', 'WASTE'),
('OT000000008', 3, 2, '2019-02-02', 'WASTE'),
('OT000000009', 3, 12, '2019-02-02', 'UNRETURNABLE'),
('OT000000010', 1, 23, '2019-02-02', 'EXPIRED'),
('OT000000011', 2, 123, '2019-02-02', 'UNRETURNABLE'),
('OT000000012', 1, 12, '2019-02-02', 'WASTE');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL,
  `nik` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_user`, `nik`, `nama`, `password`, `jabatan`, `status`) VALUES
(1, '210210001', 'Wahyu Hidayat', '$2y$10$YKdtEsQTL.v/jterYnM85.yu5lU.fqhuBK8a7YXcLuDDy0W4U.Poq', 'admin', 'aktif'),
(4, '210210002', 'John Doe', '$2y$10$pDHWMNRi7l3iMpJ4Zj.6p.uTJ9T3kDudo9/KnGhcRMjraCb425DZe', 'gudang', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `t_vendor`
--

CREATE TABLE `t_vendor` (
  `VEN_CD` int(6) NOT NULL,
  `VEN_NM` varchar(255) NOT NULL,
  `ALAMAT` text NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `TELPON` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_vendor`
--

INSERT INTO `t_vendor` (`VEN_CD`, `VEN_NM`, `ALAMAT`, `EMAIL`, `TELPON`) VALUES
(1, 'UNIRAMA PT', 'JAKARTA UTARA', 'unirama@unirama.com', '021-5123123'),
(2, 'UNILEVER INDONESIA. Tbk, PT', 'JAKARTA TIMUR', 'unileverindo@unilever.com', '021-51231222'),
(3, 'PT SAYAP MAS UTAMA Tbk', 'JAKARTA BARAT', 'sayapmas@sayapmas.com', '021-8907080');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_akses`
--
ALTER TABLE `t_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `t_category`
--
ALTER TABLE `t_category`
  ADD PRIMARY KEY (`CAT_ID`);

--
-- Indexes for table `t_expired`
--
ALTER TABLE `t_expired`
  ADD PRIMARY KEY (`ID_TRANS`);

--
-- Indexes for table `t_prod_master`
--
ALTER TABLE `t_prod_master`
  ADD PRIMARY KEY (`PROD_ID`);

--
-- Indexes for table `t_return`
--
ALTER TABLE `t_return`
  ADD PRIMARY KEY (`ID_RETURN`);

--
-- Indexes for table `t_stock_detail`
--
ALTER TABLE `t_stock_detail`
  ADD PRIMARY KEY (`PROD_ID`),
  ADD KEY `CAT_NM` (`CAT_NM`) USING BTREE,
  ADD KEY `PROD_ID` (`PROD_ID`) USING BTREE;

--
-- Indexes for table `t_stock_location`
--
ALTER TABLE `t_stock_location`
  ADD PRIMARY KEY (`ID_TRANS`);

--
-- Indexes for table `t_stock_out`
--
ALTER TABLE `t_stock_out`
  ADD PRIMARY KEY (`ID_TRANS`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `t_vendor`
--
ALTER TABLE `t_vendor`
  ADD PRIMARY KEY (`VEN_CD`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_akses`
--
ALTER TABLE `t_akses`
  MODIFY `id_akses` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_category`
--
ALTER TABLE `t_category`
  MODIFY `CAT_ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `t_expired`
--
ALTER TABLE `t_expired`
  MODIFY `ID_TRANS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_prod_master`
--
ALTER TABLE `t_prod_master`
  MODIFY `PROD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_stock_location`
--
ALTER TABLE `t_stock_location`
  MODIFY `ID_TRANS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_vendor`
--
ALTER TABLE `t_vendor`
  MODIFY `VEN_CD` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
