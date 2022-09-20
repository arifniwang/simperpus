<?php
if (session_id() == "") {
  session_start();
}
$no = 1;
$sql = $conn->query("SELECT
  `anggota`.*
  ,`kelas`.`kelas` as kelas
  ,`jenispeminjam`.`jenispeminjam` as status
  FROM
  `anggota`
  LEFT JOIN `kelas` 
  ON (`kelas`.`idkelas` = `anggota`.`kelas`)
  LEFT JOIN `jenispeminjam`
  ON (`jenispeminjam`.`idpeminjam` = `anggota`.`status`)");
while ($data = mysqli_fetch_array($sql))
{
  ?>
  <tr>
    <td><?php echo $no++;?></td>
    <td><?php echo $data['idanggota'] ?></td>
    <td><?php echo $data['nama'] ?></td>
    <td><?php echo $data['status'] ?></td>
    <td><?php echo $data['kelas'] ?></td>
    <td><?php echo $data['jeniskel'] ?></td>
    <td><?php echo $data['alamat'] ?></td>
    <td><?php echo date("d-m-Y",strtotime($data['tgllahir'])) ?></td>
    <td><?php echo $data['telp'] ?></td>
    <td><?php echo date("d-m-Y",strtotime($data['masaberlaku'])) ?></td>
    <td><img width="100px" src="images/<?php echo $data['foto'];?>"/></td>
    <td class="nw"><center>
      <button type="button" class="btn btn-sm btn-warning" onclick="openModal('edit', '<?php echo $data['idanggota']; ?>')">
      <span class="glyphicon glyphicon-edit"></span></button>
    <?php if ($_SESSION['level']=='admin'): ?>
      <button type="button" class="btn btn-sm btn-danger" onClick="openDeleteModal('<?php echo $data['idanggota'];?>')">
        <span class="glyphicon glyphicon-trash"></span></button>
      <?php endif ?>  
      </center></td>
    </tr>
    <?php
  }
  ?>