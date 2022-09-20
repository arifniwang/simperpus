<?php
header("Content-type: application/json");
include "../koneksi.php";

$idjenis = $_GET['idjenis'];
$jenis = $conn->query("SELECT * from jenisbuku where idjenis='$idjenis'");

$data = array();
$data =  mysqli_fetch_assoc($jenis);
echo json_encode($data);
?>