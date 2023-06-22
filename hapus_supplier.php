<?php 
	session_start();

    include 'kns.php';
    extract($_GET);
    $hapus_supplier = mysqli_query($kns,"delete from tb_supplier where id_supplier=$id") or die(mysqli_error($kns));
    if($hapus_supplier)
              echo "<script>alert('Berhasil dihapus'); location.href='data_supplier.php';</script>";
            else
              echo "Gagal Dihapus";
 ?>