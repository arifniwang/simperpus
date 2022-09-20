 <?php
 include "koneksi.php";

 $judul = $_POST['judul'];
 $idpenerbit =$_POST['idpenerbit'];
 $idpeng =$_POST['idpeng'];

 $sql=$conn->query("SELECT
    `buku`.`idbuku` as idbuku
    , `buku`.`judul` as judul
    , `buku`.`idletak` as letak
    , `buku`.`peng1` as pengarang
    , `penerbit`.`nama` as penerbit
    , `buku`.`jumlah` as jumlah
    , `buku`.`ket` as ket
FROM
    `simperpus`.`buku`
    INNER JOIN `simperpus`.`penerbit` 
        ON (`buku`.`idpenerbit` = `penerbit`.`idpenerbit`)
 WHERE  `buku`.`judul` LIKE '%$judul%' AND `penerbit`.`idpenerbit` LIKE '$idpenerbit'
 AND `buku`.`idpeng` LIKE '$idpeng'");
 //var_dump($qry);
 while($data=mysqli_fetch_array($sql))
 {
$no = 1;
  ?>
  <tr>
    <!-- <td><?php echo $no++; ?></td> -->
    <td><?php echo $data["idbuku"];?></td>
    <td><?php echo $data["judul"];?></td>
    <td><?php echo $data["pengarang"];?></td>
    <td><?php echo $data["penerbit"];?></td>
    <td><?php echo $data["letak"];?></td>
    <td><?php echo $data["jumlah"];?></td>
    <td><?php echo $data["ket"];?></td>
  </tr>
  <?php
}
?>