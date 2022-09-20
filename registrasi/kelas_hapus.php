<?php
    include "../koneksi.php";
    $idkelas = $_POST['idkelas'];
    $hapus = $conn->query("delete from kelas where idkelas='$idkelas'");

if ($hapus) {
  include "kelas_tbody.php";
}
?>