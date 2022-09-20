<?php
include "./koneksi.php";

if (session_id() == "") {
	session_start();
}

$passlama = md5($_POST['passlama']);
$passbaru = md5($_POST['passbaru']);
$konfirmasipass = md5($_POST['konfirmasipass']);

if ($passlama != $_SESSION['password']) {
	echo "<div class='alert alert-danger'>Password Lama Anda Salah ";
	echo "<a href='?dt=password' class='btn btn-sm btn-success'>Kembali</a>";
	echo "</div>";
} else {
	if ($konfirmasipass != $passbaru) {
		echo "<div class='alert alert-danger'>Password Baru Anda Tidak Cocok ";
		echo "<a href='?dt=password' class='btn btn-sm btn-success'>Kembali</a>";
		echo "</div>";
	}else {
	$qry = $conn->query("UPDATE user set password = '$konfirmasipass' where id = '".$_SESSION['id']."'");
	if ($qry) {
		echo "<div class='alert alert-success'>Password Baru Berhasil Disimpan ";
		echo "<a href='?dt=password' class='btn btn-sm btn-success'>Kembali</a>";
		echo "</div>";
		}
	}
}
?>