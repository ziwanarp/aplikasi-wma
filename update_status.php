<?php
session_start();

include "kns.php";
extract($_GET);
  $x = mysqli_query($kns, "UPDATE tb_penjualan SET status='$status' where id_penjualan='$id'");
  if ($x) echo "<script>alert('Update status berhasil !!'); location.href='request_pembelian.php';</script>";
  else echo "Gagal Update";
