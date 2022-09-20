<?php
include "../koneksi.php";
$idklasifikasi = $_POST['idklasifikasi'];

$sql= "SELECT * from jenisbuku where idklasifikasi = '$idklasifikasi'";
$qry= $conn->query($sql);
while($data=mysqli_fetch_object($qry))
{
                  //perulangan menampilkan data
	echo "<option value='".$data->idjenis."'>".$data->jenis."</option>";

}
?>