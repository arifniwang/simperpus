<?php
$no = 1;
$sql = $conn->query("SELECT
  `anggota`.`nama` AS a_nama
  , `jenispeminjam`.`jenispeminjam` AS j_status
  , `peminjaman`.`idpinjam` as idpinjam
  , `peminjaman`.`idanggota` as idanggota
  , `peminjaman`.`totalpinjam` as totalpinjam
  , `peminjaman`.`totaldenda` as totaldenda
  , `peminjaman`.`tanggungan` as tanggungan
  , `peminjaman`.`historykey` as historykey
  FROM
  `peminjaman`
  LEFT JOIN `anggota` 
  ON (`anggota`.`idanggota` = `peminjaman`.`idanggota`)
  LEFT JOIN `jenispeminjam` 
  ON (`jenispeminjam`.`idpeminjam` = `anggota`.`status`) where `peminjaman`.`totalpinjam` = `peminjaman`.`tanggungan` or  `peminjaman`.`tanggungan` is not null");

while ($data = mysqli_fetch_array($sql))
{
  $totalpinjam = $data['totalpinjam'];
  $tanggungan = $data['tanggungan'];
  ?>
  <tr>
    <td><?php echo $no ?></td>
    <!-- <td><?php echo $data['idpinjam'] ?></td> -->
    <td><?php echo $data['idanggota'] ?></td>
    <td><?php echo $data['a_nama'] ?></td>
    <td><?php echo $data['j_status'] ?></td>
    <td align="center"><?php echo $data['totalpinjam'] ?></td>
    <td><center>3</center></td>
    <td><center><?php if ($totalpinjam == $tanggungan) {
      echo "Sudah Dikembalikan";
    }else {
      echo $totalpinjam-$data['tanggungan'];
    } 
    ?>
  </center></td>
  <td><center>7</center></td>
            <!-- <td>
            <?php if ($tgldikembalikan == null) {
              echo "Belum Dikembalikan";
            };?>
          </td> -->
          <td class="nw"><center>
              <!-- <button type="button" class="btn btn-sm btn-info" onclick="dikembalikan('<?php echo $data['idpinjam'];?>')">
              <span class="glyphicon glyphicon-repeat"></span></button> -->
              <button type="button" class="btn btn-sm btn-info" onclick="rincian('<?php echo $data['historykey'];?>')">
                <span class="glyphicon glyphicon-zoom-in"></span></button>
              <!-- <button type="button" class="btn btn-sm btn-warning" onclick="openModal('ubah', '<?php echo $data['historykey']?>')">
              <span class="glyphicon glyphicon-edit"></span></button> -->
            </center>
          </td>
        </tr>
        <?php
        $no++;
      }
      ?>