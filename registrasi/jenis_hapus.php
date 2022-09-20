<?php
    include "../koneksi.php";
    $idjenis = $_POST['id'];
    $hapus = $conn->query("delete from jenisbuku where idjenis='$idjenis'");

if ($hapus) {
  include "jenis_tbody.php";
}
?>