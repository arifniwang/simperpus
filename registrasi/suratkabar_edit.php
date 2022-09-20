<?php
header("Content-type: application/json");
include "../koneksi.php";

$idmajalah 			= $_GET['idmajalah'];
$majalah 	= $conn->query("SELECT * from majalah where idmajalah='$idmajalah'");

$data = array();
$data =  mysqli_fetch_assoc($majalah);
echo json_encode($data);
?>