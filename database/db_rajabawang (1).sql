-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Sep 2023 pada 19.38
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.8

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
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(5) NOT NULL,
  `nama_admin` varchar(20) NOT NULL,
  `jk` enum('L','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `jk`) VALUES
(3, 'Andi', 'L');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` varchar(20) NOT NULL,
  `kode_barang` varchar(16) NOT NULL,
  `tgl` date NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga` int(20) NOT NULL,
  `isi` float NOT NULL,
  `banyaknya` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_supplier` int(5) NOT NULL,
  `status_pesanan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `kode_barang`, `tgl`, `nama_barang`, `satuan`, `harga`, `isi`, `banyaknya`, `jumlah`, `id_supplier`, `status_pesanan`) VALUES
('BSA_2083', 'BSA', '2023-06-19', 'BSA', 'kilo', 5000, 100, 5, 500, 6, 9),
('BSA_5895', 'BSA', '2023-07-14', 'BSA', 'pcs', 1000, 4, 4, 16, 6, 9),
('BSA_7105', 'BSA', '2023-07-14', 'BSa', '2', 1000, 2, 2, 4, 6, 9),
('BSA_7213', 'BSA', '2023-08-21', 'Herman su', 'pcs', 10000, 2, 2, 4, 17, 9),
('BSA_8599', 'BSA', '2023-07-14', 'BSA', 'pcs', 1000, 3, 3, 9, 6, 9),
('BSA_8648', 'BSA', '2023-07-15', 'BSA', 'pcs', 10000, 5, 5, 25, 17, 1),
('BSA_8752', 'BSA', '2023-07-14', 'BSA', 'pcs', 1000, 5, 5, 25, 6, 9),
('BSB_1541', 'BSB', '2023-08-21', 'Herman ', 'kilo', 10000, 2, 2, 4, 17, 9),
('BSB_4325', 'BSB', '2023-06-17', 'Cendol', 'pcs', 5000, 2, 2, 4, 6, 9),
('BSB_6220', 'BSB', '2023-06-17', 'tahu', 'bungkus', 3000, 5, 5, 25, 7, 9),
('BSB_7209', 'BSB', '2023-08-21', 'BSB', 'bks', 20000, 3, 3, 9, 17, 9),
('BSB_UN25/525', 'BSB', '2023-08-21', 'BSA', 'kg', 20000, 3, 5, 15, 17, 9),
('BSB_UP25/702', 'BSB', '2023-08-21', 'Cendol', 'kilo', 30000, 4, 4, 16, 17, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_supplier`
--

CREATE TABLE `tb_barang_supplier` (
  `id_brg_supplier` varchar(20) NOT NULL,
  `id_supplier` int(5) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga` int(20) NOT NULL,
  `stok_brg_supplier` int(20) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gudang`
--

CREATE TABLE `tb_gudang` (
  `id_bag_gudang` int(5) NOT NULL,
  `nama_bag_gudang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_gudang`
--

INSERT INTO `tb_gudang` (`id_bag_gudang`, `nama_bag_gudang`) VALUES
(3, 'iing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `id_laporan` int(20) NOT NULL,
  `jenis_laporan` varchar(20) NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `id_order` int(20) NOT NULL,
  `id_pesanan` int(20) NOT NULL,
  `id_stok` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(20) NOT NULL,
  `jml_order` int(20) NOT NULL,
  `tgl_order` date NOT NULL,
  `harga` int(20) NOT NULL,
  `id_barang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_owner`
--

CREATE TABLE `tb_owner` (
  `id_owner` int(5) NOT NULL,
  `nama_owner` varchar(20) NOT NULL,
  `alamat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_owner`
--

INSERT INTO `tb_owner` (`id_owner`, `nama_owner`, `alamat`) VALUES
(2, 'Odik', 'Cibingbin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penawaran`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penjualan`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id_penjualan`, `tgl_penjualan`, `nama_pembeli`, `id_barang`, `kode_barang`, `isi`, `banyaknya`, `jml_penjualan`, `harga`, `status`) VALUES
(53, '2023-06-18', 'cina', 'BSB_4325', 'BSB', 1, 1, 1, 5000, 9),
(55, '2023-06-19', 'sukanta', 'BSB_4325', 'BSB', 2, 2, 4, 2500, 9),
(56, '2023-06-19', 'xiang', 'BSA_2083', 'BSA', 5, 5, 25, 7000, 9),
(57, '2023-06-19', 'xipuntang', 'BSA_2083', 'BSA', 2, 2, 4, 7000, 9),
(58, '2023-06-19', 'customer', 'BSA_2083', 'BSA', 2, 2, 4, 1000, 0),
(59, '2023-06-19', 'customer', 'BSB_6220', 'BSB', 2, 2, 4, 2000, 1),
(60, '2023-06-20', 'customer', 'BSB_4325', 'BSB', 2, 3, 6, 10000, 0),
(61, '2023-07-15', 'customer', 'BSA_8599', 'BSA', 5, 5, 25, 10000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_persediaan`
--

CREATE TABLE `tb_persediaan` (
  `id_persediaan` int(20) NOT NULL,
  `tgl_persediaan` date NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `id_stok` int(20) NOT NULL,
  `pembelian` int(20) NOT NULL,
  `stok` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_persediaan`
--

INSERT INTO `tb_persediaan` (`id_persediaan`, `tgl_persediaan`, `id_barang`, `id_stok`, `pembelian`, `stok`) VALUES
(48, '2023-06-17', 'BSB_6220', 19, 4, 25),
(49, '2023-06-18', 'BSB_4325', 18, 1, 4),
(50, '0000-00-00', 'BSB_6220', 19, 6, 21),
(51, '2023-06-19', 'BSB_4325', 18, 4, 3),
(52, '2023-06-19', 'BSA_2083', 20, 25, 500),
(53, '2023-06-19', 'BSA_2083', 20, 4, 475),
(54, '2023-06-19', 'BSA_2083', 20, 4, 471),
(55, '2023-06-19', 'BSB_6220', 19, 4, 15),
(56, '2023-06-20', 'BSB_4325', 18, 6, -1),
(57, '2023-07-15', 'BSA_8599', 22, 25, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesanan` int(20) NOT NULL,
  `jml_pesanan` int(20) NOT NULL,
  `tgl_pesanan` date NOT NULL,
  `harga` int(20) NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `id_stok` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produksi`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_produksi`
--

INSERT INTO `tb_produksi` (`id`, `tgl_produksi`, `id_barang`, `kode_barang`, `nama_barang`, `isi`, `banyaknya`, `jumlah`) VALUES
(2, '2023-09-04', 'BSB_7209', 'PRD_7209', 'Kriminal', 2, 2, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stok`
--

CREATE TABLE `tb_stok` (
  `id_stok` int(20) NOT NULL,
  `stok_sekarang` int(20) NOT NULL,
  `id_barang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_stok`
--

INSERT INTO `tb_stok` (`id_stok`, `stok_sekarang`, `id_barang`) VALUES
(18, -7, 'BSB_4325'),
(19, 11, 'BSB_6220'),
(20, 467, 'BSA_2083'),
(21, 4, 'BSA_7105'),
(22, -16, 'BSA_8599'),
(23, 25, 'BSA_8752'),
(24, 16, 'BSA_5895'),
(25, 25, 'BSA_8648'),
(26, 4, 'BSB_1541'),
(27, 4, 'BSA_7213'),
(28, 9, 'BSB_7209'),
(29, 15, 'BSB_UN25/525'),
(30, 16, 'BSB_UP25/702');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` int(5) NOT NULL,
  `nama_supplier` varchar(20) NOT NULL,
  `alamat_supplier` varchar(20) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `no_tlp` int(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_supplier`
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
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `hak_akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
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
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_barang_supplier`
--
ALTER TABLE `tb_barang_supplier`
  ADD PRIMARY KEY (`id_brg_supplier`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indeks untuk tabel `tb_gudang`
--
ALTER TABLE `tb_gudang`
  ADD PRIMARY KEY (`id_bag_gudang`);

--
-- Indeks untuk tabel `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_stok` (`id_stok`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indeks untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `tb_owner`
--
ALTER TABLE `tb_owner`
  ADD PRIMARY KEY (`id_owner`);

--
-- Indeks untuk tabel `tb_penawaran`
--
ALTER TABLE `tb_penawaran`
  ADD PRIMARY KEY (`id_penawaran`),
  ADD KEY `id_stok` (`id_stok`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_barang_supplier` (`id_barang_supplier`);

--
-- Indeks untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `tb_persediaan`
--
ALTER TABLE `tb_persediaan`
  ADD PRIMARY KEY (`id_persediaan`),
  ADD KEY `id_stok` (`id_stok`);

--
-- Indeks untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_stok` (`id_stok`);

--
-- Indeks untuk tabel `tb_produksi`
--
ALTER TABLE `tb_produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_stok`
--
ALTER TABLE `tb_stok`
  ADD PRIMARY KEY (`id_stok`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_gudang`
--
ALTER TABLE `tb_gudang`
  MODIFY `id_bag_gudang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_laporan`
--
ALTER TABLE `tb_laporan`
  MODIFY `id_laporan` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_owner`
--
ALTER TABLE `tb_owner`
  MODIFY `id_owner` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_penawaran`
--
ALTER TABLE `tb_penawaran`
  MODIFY `id_penawaran` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_penjualan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `tb_persediaan`
--
ALTER TABLE `tb_persediaan`
  MODIFY `id_persediaan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id_pesanan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_produksi`
--
ALTER TABLE `tb_produksi`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_stok`
--
ALTER TABLE `tb_stok`
  MODIFY `id_stok` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id_supplier` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD CONSTRAINT `tb_laporan_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `tb_order` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_laporan_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_laporan_ibfk_3` FOREIGN KEY (`id_pesanan`) REFERENCES `tb_pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_laporan_ibfk_4` FOREIGN KEY (`id_stok`) REFERENCES `tb_stok` (`id_stok`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `tb_order_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD CONSTRAINT `tb_penjualan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_persediaan`
--
ALTER TABLE `tb_persediaan`
  ADD CONSTRAINT `tb_persediaan_ibfk_1` FOREIGN KEY (`id_stok`) REFERENCES `tb_stok` (`id_stok`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;