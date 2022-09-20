<?php
header("Content-type: application/json");
include "../koneksi.php";
$idpinjam = $_GET['idpinjam'];
$peminjaman = $conn->query("SELECT * from peminjaman where idpinjam='$idpinjam'");
$data = array();
$data =  mysqli_fetch_assoc($peminjaman);
echo json_encode($data);
?>