<?php
header("Content-type: application/json");
include "../koneksi.php";

$idklasifikasi	= $_GET['idklasifikasi'];
$klasifikasi	= $conn->query("SELECT * from klasifikasi where idklasifikasi='$idklasifikasi'");

$data = array();
$data =  mysqli_fetch_assoc($klasifikasi);
echo json_encode($data);
?>