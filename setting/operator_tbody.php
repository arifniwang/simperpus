<?php
if (session_id() == "") {
  session_start();
}
$no = 1;
$sql = $conn->query("SELECT * from user where level = 'operator'");
while ($data = mysqli_fetch_array($sql))
{
  ?>
  <tr>
    <td><?php echo $no++ ?></td>
    <td><?php echo $data['username'] ?></td>
    <td><?php echo $data['email'] ?></td>
    <td><?php echo $data['telp'] ?></td>
    <?php if ($_SESSION['level']=='admin'): ?>
      
    <td class="nw">
      <button onclick="openModal('edit','<?php echo $data['id']; ?>')" class="btn btn-sm btn-warning">
        <span class="glyphicon glyphicon-edit"></span></button>
        <button class="btn btn-sm btn-danger" onclick="openDeleteModal('<?php echo $data['id']; ?>')">
          <span class="glyphicon glyphicon-trash"></span></button>
        </td>
    <?php endif ?>
      </tr>
      <?php
    }
    ?>