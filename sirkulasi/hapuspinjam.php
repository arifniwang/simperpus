<?php 
include "../koneksi.php";


$trans_key		= $_POST['trans_key'];
$idbuku=$_POST['idbuku'];
$idhapus = $_POST['idhapus'];
$qty = $_POST['qty'];

$sql = $conn->query("SELECT jumlah from buku where idbuku='$idbuku' ");
$data = mysqli_fetch_array($sql);
$stok = $qty + $data['jumlah'];
$simpan2="UPDATE buku set jumlah = '$stok' where idbuku = '$idbuku' ";
$simpan = "DELETE from peminjaman_detail where idpinjamdetail='$idhapus'";

$qry2 = $conn->query($simpan2);
$qry = $conn->query($simpan);

if ($qry&&$qry2) {
		include "tabel_pinjam.php"; 
	} else { echo "Data belum dapat dihapus!!"; 
	}
?>
