<?php
	session_start();
           
            include "kns.php";
            extract($_GET);
            $del=mysqli_query($kns,"delete from tb_barang where id_barang='$id'");
            if($del)
              echo "<script>alert('Berhasil dihapus'); location.href='data_barang.php';</script>";
            else
              echo "Gagal Dihapus";
?>