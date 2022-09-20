<?php
include '../koneksi.php';

$perintah	= $_POST['perintah'];
$id 		= $_POST['id'];
$idkelas	= $_POST['idkelas'];
$kelas	    = $_POST['kelas'];

if ($perintah == "tambah") 
{
	$simpan="INSERT into kelas (idkelas, kelas) values ('$idkelas','$kelas')";
	if ($conn->query($simpan)) {
		include "kelas_tbody.php";
	}
}
elseif ($perintah=="edit") 
{
	$simpan="UPDATE kelas set kelas='$kelas' where idkelas='$idkelas'";
	if ($conn->query($simpan)) {
		include "kelas_tbody.php";
	}
}
?>