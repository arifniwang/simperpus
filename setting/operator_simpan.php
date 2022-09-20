<?php
include '../koneksi.php';

$perintah	= $_POST['perintah'];
$id 		= $_POST['id'];
$usernameopera		= $_POST['usernameopera'];
$password		= md5($_POST['passwordopera']);
$email		= $_POST['email'];
$telp	    = $_POST['telp'];

if ($perintah == "tambah") 
{
	$sql = $conn->query("SELECT username From user where username='$usernameopera' ");
	$data = mysqli_fetch_array($sql);
	if ($data) {
		echo "Ada";
	}else {
	$simpan="INSERT into user (username, password,level,email,telp) values ('$usernameopera','$password','operator','$email','$telp')";
	if ($conn->query($simpan)) {
		include "operator_tbody.php";
		}
	}
}
elseif ($perintah == "edit") 
{
	$simpan="UPDATE user set password='$password', email='$email', telp='$telp'  where id='$id'";
	if ($conn->query($simpan)) {
		include "operator_tbody.php";
	}
}
?>