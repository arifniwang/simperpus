<?php
header("Content-type: application/json");
include "../koneksi.php";

$idkelas	= $_GET['idkelas'];
$kelas	 	= $conn->query("SELECT * from kelas where idkelas='$idkelas'");

$data = array();
$data =  mysqli_fetch_assoc($kelas);
echo json_encode($data);
?>