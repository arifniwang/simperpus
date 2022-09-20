<?php
header("Content-type: application/json");
include "../koneksi.php";

$idasal		= $_GET['idasal'];
$asal	 	= $conn->query("SELECT * from asalbuku where idasal='$idasal'");

$data = array();
$data =  mysqli_fetch_assoc($asal);
echo json_encode($data);
?>