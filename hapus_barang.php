<?php
	session_start();
           
            include "kns.php";
            extract($_GET);
            $del=mysqli_query($kns,"DELETE FROM tb_produksi where kode_barang='$kode_barang'");
            $dol=mysqli_query($kns,"DELETE FROM tb_stok_produksi where kode_produksi='$kode_barang'");
            if($del && $dol)
              echo "<script>alert('Berhasil dihapus'); location.href='data_barang_produksi.php';</script>";
            else
              echo "Gagal Dihapus";
?>