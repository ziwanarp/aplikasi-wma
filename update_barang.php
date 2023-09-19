 

<?php
session_start();
           
      include "kns.php";
            extract($_GET);
            if (isset($update)) {
              $x=mysqli_query($kns,"UPDATE tb_produksi SET nama_barang='$nama_barang', jumlah='$jumlah'  WHERE id ='$id'");
              if($x) echo "<script>alert('Berhasil diedit'); location.href='data_barang_produksi.php';</script>";
              else echo "Gagal Diedit";
            }
?>