
<?php
session_start();

include "kns.php";
extract($_GET);
if (isset($update)) {
  $x = mysqli_query($kns, "UPDATE tb_penjualan SET isi='$isi', banyaknya='$banyaknya', harga='$harga',jml_penjualan='$jml_penjualan' where id_penjualan='$id'");
  if ($x) echo "<script>alert('Berhasil diedit'); location.href='data_penjualan_barang.php';</script>";
  else echo "Gagal Diedit";
}
?>