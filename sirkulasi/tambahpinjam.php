<?php
include "../koneksi.php";

$idbuku		= $_POST['idbuku'];
$jumlah		= $_POST['jumlah'];
$trans_key		= $_POST['trans_key'];
$tglhrskembali		= date_format(date_create($_POST['tglkembali']), 'Y-m-d');

$sql = $conn->query("SELECT jumlah from buku where idbuku='$idbuku' ");
$data = mysqli_fetch_array($sql);
$stok = $data['jumlah'] - $jumlah;
$simpan="INSERT INTO peminjaman_detail(idbuku,jml,historykey,tglhrskembali) VALUES ('$idbuku','$jumlah','$trans_key','$tglhrskembali')";
$simpan2="UPDATE buku set jumlah = '$stok' where idbuku = '$idbuku' ";

$berhasil=$conn->query($simpan);
$berhasil2=$conn->query($simpan2);

if ($berhasil&&$berhasil2) {
		include "tabel_pinjam.php"; 
	}
	/*else  {
		?>
				<script language="javascript">
				alert('Data belum dapat di simpan!!');
				</script>
		<?php
	}*/
?>