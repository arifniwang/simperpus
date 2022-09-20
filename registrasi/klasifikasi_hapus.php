<?php
    include "../koneksi.php";
    $idklasifikasi = $_POST['id'];
    $hapus = $conn->query("DELETE FROM klasifikasi WHERE idklasifikasi='".$idklasifikasi."' ");

if ($hapus) {
  include "klasifikasi_tbody.php";
}
?>