<?php
    include "../koneksi.php";
    $idmajalah = $_POST['idmajalah'];
    $hapus = $conn->query("delete from majalah where idmajalah='$idmajalah'");

if ($hapus) {
  include "suratkabar_tbody.php";
}
?>