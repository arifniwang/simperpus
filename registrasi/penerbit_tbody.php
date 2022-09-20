<?php
if (session_id() == "") {
  session_start();
}
$no = 1;
$sql = $conn->query("SELECT * from penerbit");
while ($data = mysqli_fetch_array($sql))
{
  ?>
  <tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $data['idpenerbit'] ?></td>
    <td><?php echo $data['nama'] ?></td>
    <td><?php echo $data['kota'] ?></td>
    <td><?php echo $data['tahun'] ?></td>
      
    <td class="nw">
      <button onclick="openModal('edit','<?php echo $data['idpenerbit']; ?>')" class="btn btn-sm btn-warning">
        <span class="glyphicon glyphicon-edit"></span></button>
    <?php if ($_SESSION['level']=='admin'): ?>
        <button class="btn btn-sm btn-danger" onclick="openDeleteModal('<?php echo $data['idpenerbit']; ?>')">
          <span class="glyphicon glyphicon-trash"></span></button>
    <?php endif ?>
        </td>
      </tr>
      <?php
    }
    ?>