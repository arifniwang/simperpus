<?php
if (session_id() == "") {
  session_start();
}
$sqlbuku = $conn->query("SELECT
  `buku`.*
  , `kondisi`.`kondisi` AS `k_kondisi`
  , `penerbit`.`nama` AS `p_nama`
  FROM
  `simperpus`.`buku`
  LEFT JOIN `simperpus`.`kondisi` 
  ON (`buku`.`kondisi` = `kondisi`.`idkondisi`)
  LEFT JOIN `simperpus`.`penerbit`
  ON (`buku`.`idpenerbit` = `penerbit`.`idpenerbit`)");

while ($data = mysqli_fetch_array($sqlbuku))
{
  ?>
  <tr>
    <td><?php echo $data['idbuku'] ?></td>
    <td><?php echo $data['accnumber'] ?></td>
    <td><?php echo $data['judul'] ?></td>
    <td><?php echo $data['peng1'] ?></td>
    <td><?php echo $data['p_nama'] ?></td>
    <td><?php echo $data['idletak'] ?></td>
    <td><?php echo $data['k_kondisi'] ?></td>
    <td><?php echo $data['jumlah'] ?></td>
    <td><?php echo $data['ket'] ?></td>
      
    <td class="nw" align="center">
      <button onclick="openModal('edit','<?php echo $data['idbuku']; ?>')" class="btn btn-sm btn-warning">
        <span class="glyphicon glyphicon-edit"></span></button>
    <?php if ($_SESSION['level']=='admin'): ?>
        <button class="btn btn-sm btn-danger" onclick="openDeleteModal('<?php echo $data['idbuku']; ?>')">
          <span class="glyphicon glyphicon-trash"></span></button>
    <?php endif ?>
        </td>
      </tr>
      <?php
    }

    ?>