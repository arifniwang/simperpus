<?php
if (session_id() == "") {
  session_start();
}
        $no = 1;
        $sql = $conn->query("SELECT
          `majalah_detail`.*
          , `majalah`.`nama` as m_nama
          , `majalah`.`jenis` as m_jenis
          FROM
          `majalah_detail`
          INNER JOIN `majalah` 
          ON (`majalah_detail`.`idmajalah` = `majalah`.`idmajalah`)");
        while ($data = mysqli_fetch_array($sql))
        {
          ?>
          <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $data['idedisi'] ?></td>
            <td><?php echo $data['idmajalah'] ?></td>
            <td><?php echo $data['m_nama'] ?></td>
            <td><?php echo $data['m_jenis'] ?></td>
            <td><?php echo $data['volume'] ?></td>
            <td><?php echo $data['bulan'] ?></td>
            <td><?php echo $data['kopike'] ?></td>
            <td><?php echo $data['tahun'] ?></td>
            <td><?php echo $data['harga'] ?></td>
            <td><?php echo $data['musim'] ?></td>
            <td><?php echo $data['tglpengadaan'] ?></td>
            <td><img width="100px" src="images/<?php echo $data['cover'];?>"/></td>
            <td class="nw"><center>
              <button type="button" class="btn btn-sm btn-warning" onclick="openModal('edit', <?php echo $data['idedisi']; ?>)">
                <span class="glyphicon glyphicon-edit"></span></button>
                <button type="button" class="btn btn-sm btn-danger" onClick="openDeleteModal(<?php echo $data['idedisi'];?>)">
                  <span class="glyphicon glyphicon-trash"></span></button>
                </center></td>
              </tr>
            <?php
            $no++;
          }
          ?>