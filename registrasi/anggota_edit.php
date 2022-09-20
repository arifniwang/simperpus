<?php
header("Content-type: aplication/json");
include "../koneksi.php";

$idanggota	= $_GET['idanggota'];
$anggota	= $conn->query("SELECT * from anggota where idanggota='$idanggota'");
$data		= array();
$data		= mysqli_fetch_assoc($anggota);
echo json_encode($data);
?>