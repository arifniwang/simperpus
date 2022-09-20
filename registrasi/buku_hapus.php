<?php
    include "../koneksi.php";
    $idbuku = $_POST['id'];
    $hapus = $conn->query("delete from buku where idbuku='$idbuku'");

if ($hapus) {
  include "buku_tbody.php";
}
?>