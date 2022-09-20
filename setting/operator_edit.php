<?php
header("Content-type: application/json");
include "../koneksi.php";

$idoperator		= $_GET['idoperator'];
$asal	 	= $conn->query("SELECT * from user where id='$idoperator'");

$data = array();
$data =  mysqli_fetch_assoc($asal);
echo json_encode($data);
?>