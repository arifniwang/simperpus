<?php
  if(!isset($_SESSION['username']))
{
    echo "<script> alert ('Anda Harus Login Terlebih Dahulu') </script>";
    echo "<script> window.location.href = \"?dt=login\" </script>";
}
?>

<div class="panel panel-primary">

  <div class="panel-heading">Data History Perpanjangan Buku</div>

  <div class="panel-body">
  <div class="row">
    <div class="form-group col-sm-6">
      
    </div>
    <div class="form-group col-sm-6" align="right">
      <input style="width:40%" class="form-control light-table-filter" type="search" data-table="order-table" placeholder="Pencarian" />
    </div>
  </div>

    <div class="table-responsive">
      <table class="table table-bordered table-hover order-table">
        <thead style="background-color: #e8e8e8;">
          <tr>
            <th><center>No</center></th>
            <th><center>Id Peminjaman</center></th>
            <th width="4%"><center>Id Anggota</center></th>
            <th><center>Nama Anggota</center></th>
            <th><center>Status</center></th>
            <!-- <th><center>Tanggal Pinjam</center></th>
            <th><center>Harus Kembali</center></th> -->
            <th width="5%"><center>Total Pinjam</center></th>
            <!-- <th><center>Tgl Kembali</center></th> -->
            <!-- <th><center>Denda</center></th>
            <th><center>Potongan</center></th>-->
            <th width="13%"><center>Total Denda</center></th>
            <th width="8.5%"><center>Aksi</center></th>
          </tr>
        </thead>
        <tbody id="tbody">
          <?php
        $no = 1;
        
        $sql = $conn->query("SELECT
          `anggota`.`nama` as `a_nama`
          , `anggota`.`kelas` as `a_kelas`
          , `kelas`.`kelas` as `k_kelas`
          , `peminjaman`.`idpinjam` as idpinjam
          , `peminjaman`.`idanggota` as idanggota
          , `peminjaman`.`tglpinjam` as tglpinjam
          , `peminjaman`.`totalpinjam` as totalpinjam
          , `peminjaman`.`totaldenda` as totaldenda
          , `peminjaman`.`historykey` as historykey
          

          FROM
          `kelas`
          INNER JOIN `anggota` 
          ON (`kelas`.`idkelas` = `anggota`.`kelas`)
          INNER JOIN `peminjaman` 
          ON (`peminjaman`.`idanggota` = `anggota`.`idanggota`)");
        while ($data = mysqli_fetch_array($sql))
        {
          
          ?>
          <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $data['idpinjam'] ?></td>
            <td><?php echo $data['idanggota'] ?></td>
            <td><?php echo $data['a_nama'] ?></td>
            <td><?php echo $data['k_kelas'] ?></td>
            <!-- <td><?php echo $data['tglpinjam'] ?></td>
            <td>
            <?php 
            if ($perpanjang == 0) {
              echo $data['tglhrskembali'];
            }
            else {
              echo $data['tglperpanjang'];
            }
            ?>
            </td> -->
            <td><?php echo $data['totalpinjam'] ?></td>
            <!-- <td><?php echo $data['tgldikembalikan'] ?></td>
            <td><?php echo $data['denda'] ?></td>
            <td><?php echo $data['potongan'] ?></td>-->
            <td><?php echo $data['totaldenda'] ?></td>
            <td id="aksi"><center>
              <button type="button" class="btn btn-sm btn-warning" onclick="rincian('<?php echo $data['historykey']?>');">
              <span class="glyphicon glyphicon-zoom-in"></span></button>
            </center>
            </td>
            </tr>
            <?php
            $no++;
          }
          ?>
        </tbody>
        </table>
      </div>
    </div>
  </div>

<!-- Modal Lihat -->
<div id="modal_lihat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" id="tbody3">
   
</div>
</div>

<!--Modal dikembalikan-->
<div id="modal_dikembalikan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-user"></i> Pengembalian Buku</h4>
      </div>
      <div class="modal-body">
        Apakah anda yakin akan mengembalikan buku ini?
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger" type="button" name="hapus" onclick="kembali()">
          <i class="glyphicon glyphicon-trash"></i>&nbsp; Ya
        </button>
        <button class="btn btn-sm btn-default" data-dismiss="modal" aria-hidden="true">
          <i class="glyphicon glyphicon-remove"></i>&nbsp; Batal
        </button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function rincian (e) {
      window.trans_key = e;
      setTimeout(function() {$('#modal_lihat').modal('show');}, 1000);
      $.ajax({
        url:'sirkulasi/perpanjangan_detail.php',
        type:'GET',
        contentType : 'application/json',
        data: {
          "trans_key" : window.trans_key
        },
        success : function (respon) {
          $('#tbody3').html(respon);
        }
    })  
  };
  
</script>