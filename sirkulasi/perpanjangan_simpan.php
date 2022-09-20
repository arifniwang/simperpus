<?php
include "../koneksi.php";
$idpinjamdetail 	= $_POST['idpinjamdetail'];
$historykey = $_POST['trans_key'];
$perpanjang 		= 1;

$simpan = "UPDATE peminjaman_detail SET 
isperpanjang = '$perpanjang'
WHERE idpinjamdetail = '$idpinjamdetail'";

$sql = mysqli_query($conn, $simpan);

	if ($sql) {
		include "peminjaman_detail.php";
	} else {
		echo "Data belum dapat disimpan!!";
	}

	?>