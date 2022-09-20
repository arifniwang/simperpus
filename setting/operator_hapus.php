<?php
    include "../koneksi.php";
    $idoperator = $_POST['idoperator'];
    $hapus = $conn->query("DELETE FROM user WHERE id='".$idoperator."'");

if ($hapus) {
  include "operator_tbody.php";
}
?>