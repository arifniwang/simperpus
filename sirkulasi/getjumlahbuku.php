<?php
include "../koneksi.php";
$idbuku = $_POST['idbuku'];
$jumlah = $_POST['jumlah'];
$qry = $conn->query("SELECT * FROM buku where jumlah > 0");
echo '<select class="col-xs-10 col-sm-5 form-control" name="idbukukk" id="idbuku" onchange="cekjumlah(this.value)" required>';
echo '<option value="">Pilih Buku</option>';
 while($key=mysqli_fetch_object($qry))
{
	$a = $key->idbuku == $idbuku ? $key->jumlah - $jumlah : $key->jumlah;
	echo '<option value=' . $key->idbuku . ' data-stok='.$a.'>'.$key->judul.'</option>';
};
echo '</select>';
?>