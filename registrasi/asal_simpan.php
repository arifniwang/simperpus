<?php
include '../koneksi.php';

$perintah	= $_POST['perintah'];
$id 		= $_POST['id'];
$idasal		= $_POST['idasal'];
$asal	    = $_POST['asal'];

if ($perintah == "tambah") 
{
	$simpan="INSERT into asalbuku (idasal, asal) values ('$idasal','$asal')";
	if ($conn->query($simpan)) {
		include "asal_tbody.php";
	}
}
elseif ($perintah=="edit") 
{
	$simpan="UPDATE asalbuku set asal='$asal' where idasal='$idasal'";
	if ($conn->query($simpan)) {
		include "asal_tbody.php";
	}
}
?>