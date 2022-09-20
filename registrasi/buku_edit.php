<?php
header("Content-type: application/json");
include "../koneksi.php";
$idbuku = $_GET['idbuku'];
$buku = $conn->query("SELECT * from buku where idbuku='$idbuku'");
$data = array();
$data =  mysqli_fetch_assoc($buku);
echo json_encode($data);
?>