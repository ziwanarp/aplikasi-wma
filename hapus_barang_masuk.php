<?php
	session_start();
           
            include "kns.php";
            extract($_GET);
            $del=mysqli_query($kns,"DELETE FROM tb_barang where id_barang='$id_barang'");
            if($del)
              echo "<script>alert('Berhasil dihapus'); location.href='data_barang_masuk.php';</script>";
            else
              echo "Gagal Dihapus";
?>