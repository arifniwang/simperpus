<?php
include '../koneksi.php';
$perintah 		= $_POST['perintah'];
$id 		= $_POST['id'];
$idedisi   	= $_POST['idedisi'];
$idmajalah = $_POST['idmajalah'];
$volume		= $_POST['volume'];
$bulan		= $_POST['bulan'];
$kopike		= $_POST['kopike'];
$no			= $_POST['no'];
$tahun 		= $_POST['tahun'];
$harga 		= $_POST['harga'];
$musim 		= $_POST['musim'];
$tglpengadaan 	= date("Y-m-d", strtotime($_POST['tglpengadaan']));
$upload_cover 	= $_POST['upload_cover'];

if ($perintah == "tambah") 
{
	$simpan="INSERT into majalah_detail 
	(idedisi, idmajalah, volume, bulan, kopike, no, tahun, harga, musim, tglpengadaan, cover) 
	values 
	('$idedisi','$idmajalah','$volume','$bulan','$kopike','$no	','$tahun','$harga','$musim','$tglpengadaan','$upload_cover')";
	if ($conn->query($simpan)) {
		include "koran_tbody.php";
	}
}
elseif ($perintah=="edit") 
{
	$simpan="UPDATE majalah_detail set 
	idmajalah='$idmajalah', 
	volume='$volume', 
	bulan='$bulan', 
	kopike='$kopike', 
	no='$no	', 
	tahun='$tahun', 
	harga='$harga', 
	musim='$musim', 
	tglpengadaan='$tglpengadaan', 
	cover='$upload_cover' 
	where idedisi='$idedisi'";
	if ($conn->query($simpan)) {
		include "koran_tbody.php";
	}
}
?>