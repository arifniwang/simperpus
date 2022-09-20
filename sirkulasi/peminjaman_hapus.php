<?php
    include "../koneksi.php";
    $idpinjam = $_POST['idpinjam'];
    $hapus = $conn->query("delete from peminjaman where idpinjam='$idpinjam'");

if ($hapus) {
  include "peminjaman_tbody.php";
}
?>