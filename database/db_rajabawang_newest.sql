-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Des 2023 pada 08.06
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `harga` int(20) DEFAULT NULL,
  `isi` float NOT NULL,
  `banyaknya` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_supplier` int(5) NOT NULL,
  `status_pesanan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gudang`
--

CREATE TABLE `tb_gudang` (
  `id_bag_gudang` int(5) NOT NULL,
  `nama_bag_gudang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_owner`
--

CREATE TABLE `tb_owner` (
  `id_owner` int(5) NOT NULL,
  `nama_owner` varchar(20) NOT NULL,
  `alamat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `status` int(1) NOT NULL,
  `kode_barang_pk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `jumlah` int(20) NOT NULL,
  `harga_jual` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stok`
--

CREATE TABLE `tb_stok` (
  `id_stok` int(20) NOT NULL,
  `stok_sekarang` int(20) NOT NULL,
  `id_barang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stok_produksi`
--

CREATE TABLE `tb_stok_produksi` (
  `id` int(11) NOT NULL,
  `kode_produksi` varchar(255) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stock` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `kota`, `no_tlp`, `email`, `id_user`) VALUES
(17, 'supplier', 'di bumi', 'kuningan', 2147483647, 'supplier@gmail.com', 33),
(18, 'Supplier_Mas Uri', 'Brebes', 'Brebes', 811314244, 'masuri@gmail.com', 34),
(19, 'Supplier_Mugi', 'Brebes', 'Brebes', 812345446, 'mugi@gmail.com', 35),
(20, 'Supplier_Mas Afif', 'Brebes', 'Brebes', 894242654, 'masafif@gmail.com', 36),
(21, 'Supplier_Sukandi', 'Kuningan', 'Kuningan', 894242654, 'sukandi@gmail.com', 37),
(22, 'Supplier_Pa Iqbal', 'Kuningan', 'Kuningan', 894242654, 'paiqbal@gmail.com', 38);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama_user`, `hak_akses`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'owner', 'owner', 'owner', 'owner'),
(27, 'customer', 'customer', 'customer', 'customer'),
(33, 'supplier', 'supplier', 'supplier', 'supplier'),
(34, 'masuri', 'masuri', 'Supplier_Mas Uri', 'supplier'),
(35, 'mugi', 'mugi', 'Supplier_Mugi', 'supplier'),
(36, 'masafif', 'masafif', 'Supplier_Mas Afif', 'supplier'),
(37, 'sukandi', 'sukandi', 'Supplier_Sukandi', 'supplier'),
(38, 'paiqbal', 'paiqbal', 'Supplier_Pa Iqbal', 'supplier');

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
-- Indeks untuk tabel `tb_stok_produksi`
--
ALTER TABLE `tb_stok_produksi`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_penjualan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT untuk tabel `tb_persediaan`
--
ALTER TABLE `tb_persediaan`
  MODIFY `id_persediaan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id_pesanan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_produksi`
--
ALTER TABLE `tb_produksi`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `tb_stok`
--
ALTER TABLE `tb_stok`
  MODIFY `id_stok` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `tb_stok_produksi`
--
ALTER TABLE `tb_stok_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id_supplier` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
