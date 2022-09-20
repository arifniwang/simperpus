<?php
include '../koneksi.php';

$perintah	= $_POST['perintah'];
$id			= $_POST['id'];
$idjenis	= $_POST['idjenis'];
$jenis	    = $_POST['jenis'];

if ($perintah == "tambah") 
{
	$simpan="INSERT into jenisbuku (idjenis, jenis) values	('$idjenis','$jenis')";
	if ($conn->query($simpan)) {
		include "jenis_tbody.php";
	}
}
elseif ($perintah=="edit") 
{
	$simpan="UPDATE jenisbuku set jenis='$jenis' where idjenis='$idjenis'";
	if ($conn->query($simpan)) {
		include "jenis_tbody.php";
	}
}
?>