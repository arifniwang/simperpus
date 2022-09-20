<?php
include '../koneksi.php';

$perintah		= $_POST['perintah'];
$id 			= $_POST['id'];
$idpeminjam		= $_POST['idpeminjam'];
$jenispeminjam  = $_POST['jenispeminjam'];
$biaya			= $_POST['biaya'];

if ($perintah == "tambah") 
{
	$simpan="INSERT into jenispeminjam (idpeminjam, jenispeminjam, biaya) values ('$idpeminjam','$jenispeminjam','$biaya')";
	if ($conn->query($simpan)) {
		include "peminjam_tbody.php";
	}
}
elseif ($perintah=="edit") 
{
	$simpan="UPDATE jenispeminjam set jenispeminjam='$jenispeminjam', biaya='$biaya' where idpeminjam='$idpeminjam'";
	if ($conn->query($simpan)) {
		include "peminjam_tbody.php";
	}
}
?>