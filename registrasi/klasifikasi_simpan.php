<?php
include '../koneksi.php';

$perintah	= $_POST['perintah'];
$idklasifikasi	= $_POST['idklasifikasi'];
$klasifikasi 	= $_POST['klasifikasi'];

if ($perintah == "tambah") 
{
	$simpan="INSERT into klasifikasi (idklasifikasi, klasifikasi) values ('$idklasifikasi','$klasifikasi')";
	if ($conn->query($simpan)) {
		include "klasifikasi_tbody.php";
	}
}
elseif ($perintah=="edit") 
{
	$simpan="UPDATE klasifikasi set klasifikasi='$klasifikasi' where idklasifikasi='$idklasifikasi'";
	if ($conn->query($simpan)) {
		include "klasifikasi_tbody.php";
	}
}
?>