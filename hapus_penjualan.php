<?php 
	session_start();
	include "kns.php";
	extract($_GET);

	$hapus_penawaran = mysqli_query($kns,"delete from tb_penjualan where id_penjualan='$id'");
		if ($hapus_penawaran) {
			echo ("<script LANGUAGE='JavaScript'>
                window.alert('Data berhasil dihapus');
                window.location.href='data_penjualan_barang.php';
                </script>");
		}
		else{
			mysqli_error($kns);
		}
	
 ?>