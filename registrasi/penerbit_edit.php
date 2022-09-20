<?php
header("Content-type: application/json");
include "../koneksi.php";

$idpenerbit = $_GET['idpenerbit'];
$penerbit = $conn->query("SELECT * from penerbit where idpenerbit='$idpenerbit'");

$data = array();
$data =  mysqli_fetch_assoc($penerbit);
echo json_encode($data);
?>