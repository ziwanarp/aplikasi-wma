-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2023 at 11:08 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rajabawang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(5) NOT NULL,
  `nama_admin` varchar(20) NOT NULL,
  `jk` enum('L','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `jk`) VALUES
(3, 'Andi', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` varchar(20) NOT NULL,
  `kode_barang` varchar(16) NOT NULL,
  `tgl` date NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga` int(20) DEFAULT NULL,
  `isi` float NOT NULL,
  `banyaknya` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_supplier` int(5) NOT NULL,
  `status_pesanan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `kode_barang`, `tgl`, `nama_barang`, `satuan`, `harga`, `isi`, `banyaknya`, `jumlah`, `id_supplier`, `status_pesanan`) VALUES
('BM_703', 'BM', '2023-09-11', 'Alpukat', 'kg', NULL, 15, 10, 150, 14, 9),
('BSB_500', 'BSB', '2023-09-11', 'Kacang Kedelai', 'kg', NULL, 10, 10, 100, 6, 9),
('BS_169', 'BS', '2023-09-11', 'Pisang', 'kg', NULL, 10, 5, 50, 15, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_supplier`
--

CREATE TABLE `tb_barang_supplier` (
  `id_brg_supplier` varchar(20) NOT NULL,
  `id_supplier` int(5) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga` int(20) NOT NULL,
  `stok_brg_supplier` int(20) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gudang`
--

CREATE TABLE `tb_gudang` (
  `id_bag_gudang` int(5) NOT NULL,
  `nama_bag_gudang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_gudang`
--

INSERT INTO `tb_gudang` (`id_bag_gudang`, `nama_bag_gudang`) VALUES
(3, 'iing');

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `id_laporan` int(20) NOT NULL,
  `jenis_laporan` varchar(20) NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `id_order` int(20) NOT NULL,
  `id_pesanan` int(20) NOT NULL,
  `id_stok` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(20) NOT NULL,
  `jml_order` int(20) NOT NULL,
  `tgl_order` date NOT NULL,
  `harga` int(20) NOT NULL,
  `id_barang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_owner`
--

CREATE TABLE `tb_owner` (
  `id_owner` int(5) NOT NULL,
  `nama_owner` varchar(20) NOT NULL,
  `alamat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_owner`
--

INSERT INTO `tb_owner` (`id_owner`, `nama_owner`, `alamat`) VALUES
(2, 'Odik', 'Cibingbin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penawaran`
--

CREATE TABLE `tb_penawaran` (
  `id_penawaran` int(20) NOT NULL,
  `tgl_penawaran` date NOT NULL,
  `jml_penawaran` int(20) NOT NULL,
  `harga_penawaran` int(20) NOT NULL,
  `id_barang` varchar(20) DEFAULT NULL,
  `id_barang_supplier` varchar(20) DEFAULT NULL,
  `id_stok` int(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_penjualan` int(20) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `nama_pembeli` varchar(50) CHARACTER SET swe7 COLLATE swe7_swedish_nopad_ci NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `kode_barang` varchar(16) NOT NULL,
  `isi` float NOT NULL,
  `banyaknya` int(11) NOT NULL,
  `jml_penjualan` int(20) NOT NULL,
  `harga` int(30) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id_penjualan`, `tgl_penjualan`, `nama_pembeli`, `id_barang`, `kode_barang`, `isi`, `banyaknya`, `jml_penjualan`, `harga`, `status`) VALUES
(70, '2023-09-11', 'Ziwana', 'BSB_500', 'BSB', 2, 3, 6, 1000, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tb_persediaan`
--

CREATE TABLE `tb_persediaan` (
  `id_persediaan` int(20) NOT NULL,
  `tgl_persediaan` date NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `id_stok` int(20) NOT NULL,
  `pembelian` int(20) NOT NULL,
  `stok` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_persediaan`
--

INSERT INTO `tb_persediaan` (`id_persediaan`, `tgl_persediaan`, `id_barang`, `id_stok`, `pembelian`, `stok`) VALUES
(70, '2023-09-11', 'BSB_500', 40, 25, 100),
(71, '2023-09-11', 'BM_703', 41, 12, 150),
(72, '2023-09-11', 'BS_169', 42, 25, 50);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesanan` int(20) NOT NULL,
  `jml_pesanan` int(20) NOT NULL,
  `tgl_pesanan` date NOT NULL,
  `harga` int(20) NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `id_stok` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_produksi`
--

CREATE TABLE `tb_produksi` (
  `id` int(20) NOT NULL,
  `tgl_produksi` date NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `isi` float NOT NULL,
  `banyaknya` int(11) NOT NULL,
  `jumlah` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_produksi`
--

INSERT INTO `tb_produksi` (`id`, `tgl_produksi`, `id_barang`, `kode_barang`, `nama_barang`, `isi`, `banyaknya`, `jumlah`) VALUES
(18, '2023-09-11', 'BSB_500', 'PRD_500', 'Tahu', 5, 5, 25),
(19, '2023-09-11', 'BM_703', 'PRD_03', 'Jus Alpukat', 3, 4, 12),
(20, '2023-09-11', 'BS_169', 'PRD_69', 'Pisan Keju', 5, 5, 25);

-- --------------------------------------------------------

--
-- Table structure for table `tb_stok`
--

CREATE TABLE `tb_stok` (
  `id_stok` int(20) NOT NULL,
  `stok_sekarang` int(20) NOT NULL,
  `id_barang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_stok`
--

INSERT INTO `tb_stok` (`id_stok`, `stok_sekarang`, `id_barang`) VALUES
(40, 75, 'BSB_500'),
(41, 138, 'BM_703'),
(42, 25, 'BS_169');

-- --------------------------------------------------------

--
-- Table structure for table `tb_stok_produksi`
--

CREATE TABLE `tb_stok_produksi` (
  `id` int(11) NOT NULL,
  `kode_produksi` varchar(255) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stock` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_stok_produksi`
--

INSERT INTO `tb_stok_produksi` (`id`, `kode_produksi`, `id_barang`, `nama_barang`, `stock`) VALUES
(5, 'PRD_500', 'BSB_500', 'Tahu', 19),
(6, 'PRD_03', 'BM_703', 'Jus Alpukat', 12),
(7, 'PRD_69', 'BS_169', 'Pisan Keju', 25);

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` int(5) NOT NULL,
  `nama_supplier` varchar(20) NOT NULL,
  `alamat_supplier` varchar(20) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `no_tlp` int(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `kota`, `no_tlp`, `email`, `id_user`) VALUES
(6, 'Mas Uri', 'Kuningan', 'Kuningan', 2147483647, 'masuri@gmail.com', 9),
(7, 'Mugi', 'cirebon', 'cirebon', 2147483647, 'mugi@gmai', 10),
(12, 'Mas Afif', 'kuningan', 'kuningan', 1234, 'afif@gmail.', 20),
(14, 'Mas Iqbal', 'Brebes', 'Brebes', 12345, 'iqbal@gmail.com', 25),
(15, 'evan', 'ku', 'kuningan', 12345, 'febrianaevan7@gmail.', 26),
(17, 'supplier', 'di bumi', 'kuningan', 2147483647, 'supplier@gmail.com', 33);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `hak_akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama_user`, `hak_akses`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'owner', 'owner', 'owner', 'owner'),
(26, 'evan', 'evan', 'evan', 'supplier'),
(27, 'customer', 'customer', 'customer', 'customer'),
(33, 'supplier', 'supplier', 'supplier', 'supplier');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_barang_supplier`
--
ALTER TABLE `tb_barang_supplier`
  ADD PRIMARY KEY (`id_brg_supplier`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `tb_gudang`
--
ALTER TABLE `tb_gudang`
  ADD PRIMARY KEY (`id_bag_gudang`);

--
-- Indexes for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_stok` (`id_stok`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tb_owner`
--
ALTER TABLE `tb_owner`
  ADD PRIMARY KEY (`id_owner`);

--
-- Indexes for table `tb_penawaran`
--
ALTER TABLE `tb_penawaran`
  ADD PRIMARY KEY (`id_penawaran`),
  ADD KEY `id_stok` (`id_stok`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_barang_supplier` (`id_barang_supplier`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tb_persediaan`
--
ALTER TABLE `tb_persediaan`
  ADD PRIMARY KEY (`id_persediaan`),
  ADD KEY `id_stok` (`id_stok`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_stok` (`id_stok`);

--
-- Indexes for table `tb_produksi`
--
ALTER TABLE `tb_produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_stok`
--
ALTER TABLE `tb_stok`
  ADD PRIMARY KEY (`id_stok`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tb_stok_produksi`
--
ALTER TABLE `tb_stok_produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_gudang`
--
ALTER TABLE `tb_gudang`
  MODIFY `id_bag_gudang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  MODIFY `id_laporan` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_owner`
--
ALTER TABLE `tb_owner`
  MODIFY `id_owner` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_penawaran`
--
ALTER TABLE `tb_penawaran`
  MODIFY `id_penawaran` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_penjualan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tb_persediaan`
--
ALTER TABLE `tb_persediaan`
  MODIFY `id_persediaan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id_pesanan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_produksi`
--
ALTER TABLE `tb_produksi`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_stok`
--
ALTER TABLE `tb_stok`
  MODIFY `id_stok` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tb_stok_produksi`
--
ALTER TABLE `tb_stok_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id_supplier` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD CONSTRAINT `tb_laporan_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `tb_order` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_laporan_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_laporan_ibfk_3` FOREIGN KEY (`id_pesanan`) REFERENCES `tb_pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_laporan_ibfk_4` FOREIGN KEY (`id_stok`) REFERENCES `tb_stok` (`id_stok`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `tb_order_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD CONSTRAINT `tb_penjualan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_persediaan`
--
ALTER TABLE `tb_persediaan`
  ADD CONSTRAINT `tb_persediaan_ibfk_1` FOREIGN KEY (`id_stok`) REFERENCES `tb_stok` (`id_stok`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
