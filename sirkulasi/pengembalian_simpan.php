<?php

	include '../koneksi.php';
	$idbuku = $_POST['idbuku_kembali'];
	$jmlpinjambuku = $_POST['jmlpinjambuku'];
	$idpinjamdetail = $_POST['idpinjamdetail'];
	$tgldikembalikan = date("Y-m-d", strtotime($_POST['tgldikembalikan']));
	$denda = $_POST['denda'];
	$potongan = $_POST['potongan'];
	$trans_key 	= $_POST['trans_key'];
	$totalbayar 	= $_POST['totalbayar'];

	$jumlahbuku = $conn->query("SELECT jumlah from buku where idbuku = '$idbuku' ");
	$qry = mysqli_fetch_array($jumlahbuku);
	$stok = $qry['jumlah'] + $jmlpinjambuku;	
	$kembali = $conn->query("SELECT * FROM peminjaman where historykey='$trans_key'");
	$data = mysqli_fetch_array($kembali);
	$tglkmbli = $data['tanggungan'];
	$simpan = "UPDATE peminjaman SET totaldenda = '$totalbayar', tanggungan = '$tglkmbli'+1 WHERE historykey = '$trans_key'";
	$simpan_detail = "UPDATE peminjaman_detail SET tgldikembalikan = '$tgldikembalikan', denda = '$denda', potongan = '$potongan' WHERE idpinjamdetail = '$idpinjamdetail'";
	$simpan_stok = "UPDATE buku SET jumlah	 = '$stok' WHERE idbuku = '$idbuku'";
	$sql = mysqli_query($conn, $simpan);
	$sql_detail = mysqli_query($conn, $simpan_detail);
	$sql_stok = mysqli_query($conn, $simpan_stok);

	/*Nampilke tabel e orak neng kene, soale file iki nggo simpan looping*/
	
	if ($sql&&$sql_detail&&$sql_stok) {
		include "peminjaman_detail.php";
	} else {
		echo "Data belum dapat disimpan!!";
	}

?>