<?php
if (session_id() == "") {
  session_start();
}
$no = 1;
$sql = $conn->query("SELECT * from jenispeminjam");
while ($data = mysqli_fetch_array($sql))
{
  ?>
  <tr>
    <td><?php echo $no++ ?></td>
    <td><?php echo $data['idpeminjam'] ?></td>
    <td><?php echo $data['jenispeminjam'] ?></td>
    <td><?php echo $data['biaya'] ?></td>
      
    <td class="nw">
      <button onclick="openModal('edit',<?php echo $data['idpeminjam']; ?>)" class="btn btn-sm btn-warning">
        <span class="glyphicon glyphicon-edit"></span></button>
    <?php if ($_SESSION['level']=='admin'): ?>
        <button class="btn btn-sm btn-danger" onclick="openDeleteModal(<?php echo $data['idpeminjam']; ?>)">
          <span class="glyphicon glyphicon-trash"></span></button>
    <?php endif ?>
        </td>
    </tr>
    <?php
  }
  ?>