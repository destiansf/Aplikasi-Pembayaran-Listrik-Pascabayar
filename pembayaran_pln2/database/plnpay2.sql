-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2024 at 01:42 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plnpay2`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `pelanggan_900_watt` ()   BEGIN
    SELECT p.id_pelanggan, p.nama_pelanggan, t.daya
    FROM pelanggan p
    JOIN tarif t ON p.id_tarif = t.id_tarif
    WHERE t.daya = 900;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nomor_kwh` int(11) DEFAULT NULL,
  `nama_pelanggan` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `id_tarif` int(11) DEFAULT NULL,
  `tarifperkwh` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `password`, `nomor_kwh`, `nama_pelanggan`, `alamat`, `id_tarif`, `tarifperkwh`) VALUES
(1, 'rukaw', '67890', 1234567890, 'Rukaw', 'Jl. Makmur No. 2', 2, 1450),
(2, 'aramg', '23456', 234567890, 'Aram', 'Jl. Subur No. 5', 1, 1350),
(3, 'asaw', '12345', 34567890, 'Asa', 'Jl. Maju No. 9', 4, 1550),
(5, 'surayani', '12345', 567890123, 'Surayani', 'Jl. Raya No. 14', 2, 1350),
(6, 'jody', '12345', 678901234, 'Jody', 'Jl. Camat No. 2', 3, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_tagihan` int(11) DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `biaya_admin` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_tagihan`, `id_pelanggan`, `tanggal_pembayaran`, `biaya_admin`, `total_bayar`, `id_user`) VALUES
(13, 1, 1, '2024-02-02', 2500, 582500, 1),
(14, 2, 1, '2024-03-01', 2500, 582500, 1),
(15, 3, 5, '2024-07-09', 2500, 872500, 1),
(16, 4, 2, '2024-05-09', 2500, 407500, 2);

-- --------------------------------------------------------

--
-- Table structure for table `penggunaan`
--

CREATE TABLE `penggunaan` (
  `id_penggunaan` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `meter_awal` int(11) DEFAULT NULL,
  `meter_akhir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penggunaan`
--

INSERT INTO `penggunaan` (`id_penggunaan`, `id_pelanggan`, `bulan`, `tahun`, `meter_awal`, `meter_akhir`) VALUES
(1, 1, 'Januari', 2024, 100, 500),
(2, 1, 'Februari', 2024, 600, 1000),
(3, 5, 'Maret', 2024, 200, 800),
(4, 2, 'April', 2024, 0, 300),
(5, 3, 'April', 2024, 300, 1000),
(6, 5, 'April', 2024, 900, 1300);

--
-- Triggers `penggunaan`
--
DELIMITER $$
CREATE TRIGGER `after_insert_penggunaan` AFTER INSERT ON `penggunaan` FOR EACH ROW BEGIN
    DECLARE jumlah_meter INT;
    SET jumlah_meter = NEW.meter_akhir - NEW.meter_awal;

    INSERT INTO tagihan (id_penggunaan, id_pelanggan, bulan, tahun, jumlah_meter, status)
    VALUES (NEW.id_penggunaan, NEW.id_pelanggan, NEW.bulan, NEW.tahun, jumlah_meter, 'belum lunas')
    ON DUPLICATE KEY UPDATE
        jumlah_meter = VALUES(jumlah_meter),
        status = VALUES(status);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `id_penggunaan` int(11) DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `jumlah_meter` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `id_penggunaan`, `id_pelanggan`, `bulan`, `tahun`, `jumlah_meter`, `status`) VALUES
(1, 1, 1, 'Januari', 2024, 400, 'lunas'),
(2, 2, 1, 'Februari', 2024, 400, 'lunas'),
(3, 3, 5, 'Maret', 2024, 600, 'lunas'),
(4, 4, 2, 'April', 2024, 300, 'lunas'),
(5, 5, 3, 'April', 2024, 700, 'belum lunas'),
(6, 6, 5, 'April', 2024, 400, 'belum lunas');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `id_tarif` int(11) NOT NULL,
  `daya` int(11) DEFAULT NULL,
  `tarifperkwh` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id_tarif`, `daya`, `tarifperkwh`) VALUES
(1, 450, 1350),
(2, 900, 1450),
(3, 1300, 1500),
(4, 2200, 1550);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_admin` varchar(100) DEFAULT NULL,
  `id_level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_admin`, `id_level`) VALUES
(1, 'destiy', '12345', 'Desti', 1),
(2, 'acal', '12345', 'Acal', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `nomor_kwh` (`nomor_kwh`),
  ADD KEY `id_tarif` (`id_tarif`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_tagihan` (`id_tagihan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `penggunaan`
--
ALTER TABLE `penggunaan`
  ADD PRIMARY KEY (`id_penggunaan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `tagihan_ibfk_1` (`id_penggunaan`),
  ADD KEY `fk_id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `penggunaan`
--
ALTER TABLE `penggunaan`
  MODIFY `id_penggunaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `FK_tarif` FOREIGN KEY (`id_tarif`) REFERENCES `tarif` (`id_tarif`),
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`id_tarif`) REFERENCES `tarif` (`id_tarif`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_tagihan`) REFERENCES `tagihan` (`id_tagihan`),
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `penggunaan`
--
ALTER TABLE `penggunaan`
  ADD CONSTRAINT `penggunaan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Constraints for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD CONSTRAINT `fk_id_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `tagihan_ibfk_1` FOREIGN KEY (`id_penggunaan`) REFERENCES `penggunaan` (`id_penggunaan`) ON DELETE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
