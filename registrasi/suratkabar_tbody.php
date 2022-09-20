<?php
$no = 1;
$sql = $conn->query("SELECT
   `majalah`.*
    , `asalbuku`.`asal` as a_asal
FROM
    `majalah`
    LEFT JOIN `asalbuku` 
        ON (`majalah`.`idasal` = `asalbuku`.`idasal`)");
while ($data = mysqli_fetch_array($sql))
{
  ?>
  <tr>
    <td><?php echo $no++ ?></td>
    <td><?php echo $data['idmajalah'] ?></td>
    <td><?php echo $data['nama'] ?></td>
    <td><?php echo $data['penerbit'] ?></td>
    <td><?php echo $data['kota'] ?></td>
    <td><?php echo $data['issn'] ?></td>
    <td><?php echo $data['alamat'] ?></td>
    <td><?php echo $data['jenis'] ?></td>
    <td><?php echo $data['a_asal'] ?></td>
    <td class="nw">
      <button onclick="openModal('edit',<?php echo $data['idmajalah']; ?>)" class="btn btn-sm btn-warning">
        <span class="glyphicon glyphicon-edit"></span></button>
        <button class="btn btn-sm btn-danger" onclick="openDeleteModal(<?php echo $data['idmajalah']; ?>)">
          <span class="glyphicon glyphicon-trash"></span></button>
        </td>
    </tr>
    <?php
  }
  ?>