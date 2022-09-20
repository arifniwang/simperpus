<?php
header("Content-type: application/json");
include "../koneksi.php";

$idedisi 			= $_GET['idedisi'];
$edisi 	= $conn->query("SELECT * from majalah_detail where idedisi='$idedisi'");

$data = array();
$data =  mysqli_fetch_assoc($edisi);
echo json_encode($data);
?>