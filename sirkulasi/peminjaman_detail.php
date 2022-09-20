<?php
$no = 1;
include "../koneksi.php";
$historykey = $_POST['trans_key'];
$sql = $conn->query("SELECT
  `peminjaman_detail`.jml as jml
  ,`peminjaman_detail`.isperpanjang as isperpanjang
  ,`peminjaman_detail`.idpinjamdetail as idpinjamdetail
  ,`peminjaman`.tglpinjam as tglpinjam
  ,`peminjaman_detail`.tglhrskembali as tglhrskembali
  ,`peminjaman`.historykey as historykey
  ,`buku`.`judul` as b_judul
  ,`buku`.`peng1` as b_pengarang
  ,`penerbit`.`nama` as p_penerbit
  FROM
  `peminjaman_detail` 
  INNER JOIN `buku` 
  ON (`peminjaman_detail`.`idbuku` = `buku`.`idbuku`)
  LEFT JOIN `penerbit` 
  ON (`penerbit`.`idpenerbit` = `buku`.`idpenerbit`)
  INNER JOIN `peminjaman`
  ON(`peminjaman`.`historykey` = `peminjaman_detail`.`historykey`) where `peminjaman`.`historykey`='$historykey' and `peminjaman_detail`.`tgldikembalikan` is null ");
while ($data = mysqli_fetch_array($sql))
{
 $perpanjangan = $data['isperpanjang'];
 $tglhrskembali = $data['tglhrskembali'];
 $tgldiperpanjang = date('d-m-Y', strtotime('+1 week' , strtotime($tglhrskembali)));
 ?>
 <tr>
  <td align="center"><?php echo $no ?></td>
  <td align="center"><?php echo $data['b_judul'] ?></td>
  <td align="center"><?php echo $data['b_pengarang'] ?></td>
  <td align="center"><?php echo $data['p_penerbit'] ?></td>
  <td align="center"><?php echo $data['jml'] ?></td>
  <td align="center"><?php echo date('d-m-Y', strtotime($data['tglpinjam']))?></td>
  <td align="center"><?php echo date('d-m-Y', strtotime($tglhrskembali));?></td>
  <td align="center"> 
  <?php if ($perpanjangan == 0) { ?>
    <button id="simpan" type="button" class="btn btn-sm btn-info" onclick="togglePerpanjangan('<?php echo $data['idpinjamdetail']?>')">
      <span class="glyphicon glyphicon-retweet"></span>
    </button>
    <?php }
    else {
      echo $tgldiperpanjang;
    }

    ?> 
  </td>
  <td align="center">
  <button class="btn btn-sm btn-success" type="button" onclick="tgldikembalikan('<?php echo $data['idpinjamdetail']?>')">
  <span class="glyphicon glyphicon-ok"></span>
  </button>
    </td>
  </tr>
  <?php
  $no++;
}
?>