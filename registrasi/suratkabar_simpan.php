<?php
include '../koneksi.php';

$perintah	= $_POST['perintah'];
$id 		= $_POST['id'];
$idmajalah 	= $_POST['idmajalah'];
$nama   	= $_POST['nama'];
$penerbit	= $_POST['penerbit'];
$kota		= $_POST['kota'];
$issn		= $_POST['issn'];
$alamat		= $_POST['alamat'];
$jenis		= $_POST['jenis'];
$idasal 	= $_POST['idasal'];

if ($perintah == "tambah") 
{
	$simpan="INSERT into majalah (idmajalah, nama,penerbit,kota,issn,alamat,jenis,idasal) values ('$idmajalah','$nama','$penerbit','$kota','$issn','$alamat','$jenis','$idasal')";
	if ($conn->query($simpan)) {
		include "suratkabar_tbody.php";
	}
}
elseif ($perintah=="edit") 
{
	$simpan="UPDATE majalah Set nama='$nama', penerbit='$penerbit', kota='$kota', issn='$issn', alamat='$alamat', jenis='$jenis',
	idasal='$idasal' where idmajalah='$idmajalah'"	;
	if ($conn->query($simpan)) {
		include "suratkabar_tbody.php";
	}
}
?>