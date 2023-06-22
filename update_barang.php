 

<?php
session_start();
           
      include "kns.php";
            extract($_GET);
            if (isset($update)) {
              $x=mysqli_query($kns,"UPDATE tb_barang SET nama_barang='$nama', satuan='$satuan', harga='$harga', id_supplier='$supplier' where id_barang='$id'");
              if($x) echo "<script>alert('Berhasil diedit'); location.href='data_barang.php';</script>";
              else echo "Gagal Diedit";
            }
?>