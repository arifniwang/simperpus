<?php
include '../koneksi.php';
$perintah		= $_POST['perintah'];
$idbuku		= $_POST['idbuku'];
$tglinput	= date("Y-m-d", strtotime($_POST['tglinput']));
$idletak    = $_POST['idletak'];
$idklass    = $_POST['idklass'];
$idpeng   	= $_POST['idpeng'];
$idjudul   	= $_POST['idjudul'];
$judul      = $_POST['judul'];
$pengarang  = $_POST['pengarang'];
$penerjemah = $_POST['penerjemah'];
$editor     = $_POST['editor'];
$tim        = $_POST['tim'];
$volume     = $_POST['volume'];
$edisi      = $_POST['edisi'];
$cetakan    = $_POST['cetakan'];
$kopike     = $_POST['kopike'];
$idjenis    = $_POST['idjenis'];
$idbahasa   = $_POST['idbahasa'];
$idasal     = $_POST['idasal'];
$notasi     = $_POST['notasi'];
$idpenerbit = $_POST['idpenerbit'];
$idkota     = $_POST['idkota'];
$tahun      = $_POST['tahun'];
$harga      = $_POST['harga'];
$pengadaan  = date("Y-m-d", strtotime($_POST['pengadaan']));
$kondisi    = $_POST['kondisi'];
$jumlah    = $_POST['jumlah'];
$ket    = $_POST['ket'];
$accnumber  = $_POST['accnumber'];

if ($perintah == "tambah") 
{
	$simpan="INSERT into buku (idbuku,idletak,idklass,idpeng,idpenerbit,idjudul,judul,penerjemah,editor,tim,volume,edisi,cetakan,kopike,idjenis,idbahasa,idasal,notasi,idkota,tahun,harga,pengadaan,kondisi,accnumber,tglinput,jumlah,peng1,ket)
			valueS ('$idbuku', '$idletak', '$idklass','$idpeng', '$idpenerbit', '$idjudul','$judul','$penerjemah','$editor', '$tim','$volume', '$edisi', '$cetakan', '$kopike', '$idjenis', '$idbahasa', '$idasal', '$notasi','$idkota', '$tahun', '$harga', '$pengadaan' , '$kondisi', '$accnumber', '$tglinput','$jumlah','$pengarang','$ket') ";
	if ($conn->query($simpan)) {
		include "buku_tbody.php";
	}
}
elseif ($perintah=="edit") 
{
	$simpan="UPDATE buku Set 
	idletak = '$idletak',
	idklass ='$idklass' ,
	idpeng = '$idpeng',
	idpenerbit = '$idpenerbit',
	idjudul = '$idjudul',
	judul = '$judul',
	penerjemah = '$penerjemah',
	editor = '$editor',
	tim = '$tim',
	volume = '$volume',
	edisi = '$edisi',
	cetakan = '$cetakan',
	kopike = '$kopike',
	idjenis = '$idjenis',
	idbahasa = '$idbahasa',
	idasal = '$idasal',
	notasi ='$notasi' ,
	idkota ='$idkota' ,
	tahun = '$tahun',
	harga =  '$harga',
	pengadaan =  '$pengadaan',
	kondisi = '$kondisi',
	accnumber = '$accnumber',
	tglinput =  '$tglinput',
	jumlah = '$jumlah',
	ket = '$ket',
	peng1 = '$pengarang'
	where idbuku='$idbuku'"	;
	if ($conn->query($simpan)) {
		include "buku_tbody.php";
	}
}
?>