<?php

$sql=$conn->query("SELECT * FROM buku");
while($dt=mysqli_fetch_object($sql))
{
                                                    //perulangan menampilkan data
	echo "<option value='".$dt->idbuku."' data-stok='".$dt->jumlah."'>".$dt->judul."</option>";

}
?>
<?php

include '../koneksi.php';         
$sql='SELECT * from kelas where idpinjam="'.$idkelas.'" ';
$qry=mysql_query($sql);
while($data=mysql_fetch_object($qry))
{
//perulangan menampilkan data
	echo "<option value='".$data->idkelas."' >".$data->kelas."</option>";

}
?>