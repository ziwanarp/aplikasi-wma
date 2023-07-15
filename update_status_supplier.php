<?php
session_start();

include "kns.php";
extract($_GET);
$x = mysqli_query($kns, "UPDATE tb_barang SET status_pesanan='$status' where id_barang='$id_barang'");
if ($x) echo "<script>alert('Update status berhasil !!'); location.href='request_barang_supplier.php';</script>";
else echo "Gagal Update";
