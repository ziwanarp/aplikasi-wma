<?php
	session_start();
           
            include "kns.php";
            extract($_GET);
            $del=mysqli_query($kns,"DELETE FROM tb_produksi where id='$id'");
            $dol=mysqli_query($kns,"DELETE FROM tb_stok_produksi where id_barang='$id_barang'");
            if($del && $dol)
              echo "<script>alert('Berhasil dihapus'); location.href='data_barang_produksi.php';</script>";
            else
              echo "Gagal Dihapus";
?>