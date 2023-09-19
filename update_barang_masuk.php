 

<?php
session_start();
           
      include "kns.php";
            extract($_GET);
            if (isset($update)) {
              $x=mysqli_query($kns,"UPDATE tb_barang SET nama_barang='$nama_barang', jumlah='$jumlah', tgl='$tgl'  WHERE id_barang ='$id_barang'");
              if($x) echo "<script>alert('Berhasil diedit'); location.href='data_barang_masuk.php';</script>";
              else echo "Gagal Diedit";
            }
?>