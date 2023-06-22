<?php 
	session_start();
	include "kns.php";
	extract($_GET);

	$hapus_user = mysqli_query($kns,"delete from tb_user where id_user='$id'");
		if ($hapus_user) {
			echo ("<script LANGUAGE='JavaScript'>
                window.alert('Data berhasil dihapus');
                window.location.href='data_user.php';
                </script>");
		}
		else{
			mysqli_error($kns);
		}
	
 ?>