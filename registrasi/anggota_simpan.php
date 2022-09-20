<?php
include '../koneksi.php';

$perintah		= $_POST['perintah'];
$id 			= $_POST['id'];
$idanggota     	= $_POST['idanggota'];
$nama	      	= $_POST['nama'];
$status	      	= $_POST['status'];
$kelas		   	= $_POST['kelas'];
$alamat 	   	= $_POST['alamat'];
$jeniskel      	= $_POST['jeniskel'];
$tgllahir      	= date("Y-m-d", strtotime($_POST["tgllahir"]));
/*$alamatsekolah 	= $_POST['alamatsekolah'];*/
$telp			= $_POST['telp'];
$masaberlaku   	= date("Y-m-d", strtotime($_POST["masaberlaku"]));
$upload_foto	= $_POST['upload_foto'];

if ($perintah == "tambah") {
	$sql = $conn->query("SELECT idanggota From anggota where idanggota='$idanggota' ");
	$data = mysqli_fetch_array($sql);
	if ($data) {
		echo "Ada";
		return false;
	}else {
		$simpan = "INSERT INTO anggota(
			idanggota,
			nama,
			alamat,
			status,
			kelas,
			jeniskel,
			tgllahir,
			masaberlaku,
			telp,
			foto
			) VALUES (
			'$idanggota',
			'$nama',
			'$alamat',
			'$status',
			'$kelas',
			'$jeniskel',
			'$tgllahir',
			'$masaberlaku',
			'$telp',
			'$upload_foto'
			)";

$sql = mysqli_query($conn, $simpan);

if ($sql) {
	include "anggota_tbody.php";
} else {
	echo "Data belum dapat disimpan!!";
}
}
} else if ($perintah == "edit") {
	$simpan = "UPDATE anggota SET
	nama 			= '$nama',
	alamat 			= '$alamat',
	status 			= '$status',
	kelas 			= '$kelas',
	jeniskel 		= '$jeniskel', 
	tgllahir 		= '$tgllahir', 
	masaberlaku 	= '$masaberlaku',
	telp 			= '$telp',
	foto 			= '$upload_foto'
	where idanggota = '$idanggota'";

	$sql=mysqli_query($conn, $simpan);

	if ($sql) {
		include "anggota_tbody.php";
	} else {
		echo "Data belum dapat disimpan!!";
	}
} else {
	echo "Data belum dapat disimpan!!";
}

var_dump($simpan);

?>