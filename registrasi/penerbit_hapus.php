<?php
    include "../koneksi.php";
    $idpenerbit = $_POST['idpenerbit'];
    $hapus = $conn->query("delete from penerbit where idpenerbit='$idpenerbit'");

if ($hapus) {
  include "penerbit_tbody.php";
}
?>