<?php
    include "../koneksi.php";
    $idpeminjam = $_POST['idpeminjam'];
    $hapus = $conn->query("delete from jenispeminjam where idpeminjam='$idpeminjam'");

if ($hapus) {
  include "peminjam_tbody.php";
}
?>