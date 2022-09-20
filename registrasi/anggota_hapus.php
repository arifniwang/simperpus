<?php
    include "../koneksi.php";
    $idanggota = $_POST['id'];
    $hapus = $conn->query("delete from anggota where idanggota='$idanggota'");

if ($hapus) {
  include "anggota_tbody.php";
}
?>