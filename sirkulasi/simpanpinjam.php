<?php
include "../koneksi.php";

$perintah		= $_POST['perintah'];
$idpinjam		= $_POST['idpinjam'];
$idanggota		= $_POST['idanggota'];
$tglpinjam		= date_format(date_create($_POST['tglpinjam']), 'Y-m-d');
$total			= $_POST['total'];
$trans_key		= $_POST['trans_key'];

if ($perintah == "tambah") {
	$simpan="INSERT INTO peminjaman(idpinjam,idanggota,tglpinjam,totalpinjam,historykey) VALUES 
	('$idpinjam','$idanggota','$tglpinjam','$total','$trans_key')";
	$berhasil=$conn->query($simpan);
	if($berhasil)
	{
		include "peminjaman_tbody.php";
	}	
}
/*else {
	$simpan = "UPDATE peminjaman SET
	idanggota='$idanggota',
	totalpinjam = '$total' 
	where idpinjam = '$idpinjam'";
	$berhasil=$conn->query($simpan);
	if($berhasil)
	{
		include "peminjaman_tbody.php";
	}	
}*/


?>