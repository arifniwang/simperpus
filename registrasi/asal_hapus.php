<?php
    include "../koneksi.php";
    $idasal = $_POST['idasal'];
    $hapus = $conn->query("DELETE FROM asalbuku WHERE idasal='".$idasal."'");

if ($hapus) {
  include "asal_tbody.php";
}
?>