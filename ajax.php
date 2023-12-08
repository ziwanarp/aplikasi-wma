<?php 
	session_start();
	include "kns.php";
	extract($_GET);

	$data = mysqli_query($kns,"SELECT * FROM tb_produksi WHERE id = '$id'");
    $row = mysqli_fetch_row($data);
    echo $row[8];
	
 ?>