<?php
header("Content-type: application/json");
include "../koneksi.php";

$trans_key   = $_GET['trans_key'];
$peminjaman   = $conn->query("SELECT
    `peminjaman`.`idpinjam` as idpinjam
    , `peminjaman`.`idanggota` as idanggota
    , `anggota`.`nama` as nama
    , `kelas`.`kelas` as kelas
    , `peminjaman`.`tglpinjam` as tglpinjam
    , `peminjaman_detail`.`tglhrskembali` as tglhrskembali
FROM
    `anggota`
    INNER JOIN `peminjaman` 
        ON (`anggota`.`idanggota` = `peminjaman`.`idanggota`)
    INNER JOIN `peminjaman_detail` 
        ON (`peminjaman_detail`.`historykey` = `peminjaman`.`historykey`)
    INNER JOIN `kelas` 
        ON (`kelas`.`idkelas` = `anggota`.`kelas`) where `peminjaman`.`historykey`='$trans_key'");

$data = array();
$data =  mysqli_fetch_assoc($peminjaman);
echo json_encode($data);
?>