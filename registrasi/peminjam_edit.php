<?php
header("Content-type: application/json");
include "../koneksi.php";

$idpeminjam		= $_GET['idpeminjam'];
$jenispeminjam 	= $conn->query("SELECT * from jenispeminjam where idpeminjam='$idpeminjam'");

$data = array();
$data =  mysqli_fetch_assoc($jenispeminjam);
echo json_encode($data);
?>