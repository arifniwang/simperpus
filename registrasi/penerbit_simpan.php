<?php
include '../koneksi.php';

$perintah	= $_POST['perintah'];
$id			= $_POST['id'];
$idpenerbit	= $_POST['idpenerbit'];
$nama	    = $_POST['nama'];
$kota	    = $_POST['kota'];
$tahun	    = $_POST['tahun'];

if ($perintah == "tambah") 
{
	$simpan="INSERT into penerbit (idpenerbit, nama, kota, tahun) values	('$idpenerbit','$nama', '$kota', '$tahun')";
	if ($conn->query($simpan)) {
		include "penerbit_tbody.php";
	}
}
elseif ($perintah=="edit") 
{
	$simpan="UPDATE penerbit set nama='$nama', kota='$kota', tahun='$tahun' where idpenerbit='$idpenerbit'";
	if ($conn->query($simpan)) {
		include "penerbit_tbody.php";
	}
}
?>