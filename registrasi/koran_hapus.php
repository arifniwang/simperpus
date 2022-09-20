<?php
    include "../koneksi.php";
    $idedisi = $_POST['idedisi'];
    $hapus = $conn->query("delete from majalah_detail where idedisi='$idedisi'");

if ($hapus) {
  include "koran_tbody.php";
  exit();
}
?>