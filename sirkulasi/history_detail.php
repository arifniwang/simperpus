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
  ,`peminjaman_detail`.tgldikembalikan as tgldikembalikan
  ,`peminjaman_detail`.denda as denda
  ,`peminjaman_detail`.potongan as potongan
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
  ON(`peminjaman`.`historykey` = `peminjaman_detail`.`historykey`) where `peminjaman`.`historykey`='$historykey' and `peminjaman_detail`.`tgldikembalikan` is not null ");
$total = 0;
while ($data = mysqli_fetch_array($sql))
{
$subtotal = $data['denda'] - $data['potongan'];

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
  <?php 
  if ($perpanjangan == 0) {
      echo "-";
    }
    else {
      echo $tgldiperpanjang;
    }

    ?> 
  </td>
  <td align="center">
  <?php echo date('d-m-Y',strtotime($data['tgldikembalikan']))?>
  </button>
    </td>
    <td>
      <?php echo $data['denda'];?>
    </td>
    <td>
      <?php echo $data['potongan'];?>
    </td>
    <td>
      <?php echo $subtotal;?>
    </td>
  </tr>
  <?php
  $no++;
  $total += $subtotal;
}
?>
<tr>
  <td colspan="11" align="right" style="color:red"><b>Total Denda</b></td>
  <td style="color:red"><b><?php echo $total;?></b></td>
</tr>