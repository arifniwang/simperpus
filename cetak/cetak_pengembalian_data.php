<?php
if(!isset($_SESSION['username']))
{
  echo "<script> alert ('Anda Harus Login Terlebih Dahulu') </script>";
  echo "<script> window.location.href = \"?dt=login\" </script>";
}
?>
<div>
  <ul class="breadcrumb">
    <li>
      <a href="#"><span class="glyphicon glyphicon-book"></span> Cetak pengembalian</a>
    </li>
  </ul>
</div>
<div class="panel panel-primary">
  <!-- Cetak pengembalian berdasarkan nama periode idanggota-->
  <div class="panel-heading">Cetak pengembalian</div>

  <div class="panel-body">
    <form action="cetak/cetak_pengembalian_idanggota.php" method="GET" target="_blank">
      <table class="form-inline panel-body">
        <tr>
          <td class="form-group">
            <select class="form-control col-sm-5 chosen-select" name="idanggota" id="idanggota" required>
              <option value="%">Semua Anggota</option>
              <?php
              $sql="SELECT 
              *
              FROM
              anggota order by idanggota";
              $qry=mysqli_query($conn,$sql);
              while($data=mysqli_fetch_object($qry))
              {
                //perulangan menampilkan data
                echo "<option value='".$data->idanggota."'>".$data->idanggota." | ".$data->nama."</option>";                                             
              }
              ?>
            </select>
          </td>
          <td>&nbsp; &nbsp;</td>
          <td class="form-group">
            <div class="form-group">
              <button class="btn btn-info" type="submit" id="cetak" name="cetak">
                <i class="ace-icon fa fa-check bigger-110"></i>
                Cetak
              </button>
            </div>
          </td>
        </tr>
      </table>
    </form></br>

    <!-- Cetak pengembalian berdasarkan nama anggota-->
<!--     <form action="cetak/cetak_pengembalian_namaanggota.php" method="GET" target="_blank">
      <table class="form-inline panel-body">
        <tr>
          <td class="form-group">
            <div class="form-group">
              <select class="form-control col-sm-5 chosen-select" name="idanggota" id="idanggota" required>
                <option value="">Pilih Nama Anggota</option>
                <?php
                $sql="SELECT 
                `pengembalian`.`idanggota`  as idanggota
                ,`anggota`.`nama` as nama
                FROM
                `simperpus`.`anggota`
                INNER JOIN `simperpus`.`pengembalian` 
                ON (`anggota`.`idanggota` = `pengembalian`.`idanggota`) group by idanggota";
                $qry=mysqli_query($conn,$sql);
                while($data=mysqli_fetch_object($qry))
                {
                                      //perulangan menampilkan data
                  echo "<option value='".$data->idanggota."'>".$data->nama."</option>";                                             
                }
                ?>
              </select>
            </div>
          </td>
          <td>&nbsp; &nbsp;</td>
          <td class="form-group">
            <div class="form-group">
              <button class="btn btn-info" type="submit" id="cetak" name="cetak">
                <i class="ace-icon fa fa-check bigger-110"></i>
                Cetak
              </button> 
            </div>
          </td>
        </tr>
      </table>
    </form> </br>
 -->
    <!-- Cetak pengembalian berdasarkan tanggal kembali-->
    <form action="cetak/cetak_pengembalian_tanggal.php" method="GET" target="_blank">
      <table class="form-inline panel-body">
        <td class="form-group">
          <div class="form-group">
           <input type="text" required="" placeholder="Tanggal kembali" id="tglkembaliawal" class="form-control datepicker" name="tglkembaliawal" >
         </div>
       </td>
       <td>&nbsp; s/d &nbsp;</td>
       <td>
        <div class="form-group">
          <input type="text" required="" placeholder="Tanggal kembali" id="tglkembaliakhir" class="form-control datepicker" name="tglkembaliakhir">
        </div>
      </td>
      <td class="form-group">
        &nbsp;&nbsp;
        <div class="form-group">
          <button class="btn btn-info" type="submit" id="cetak" name="cetak">
            <i class="ace-icon fa fa-check bigger-110"></i>
            Cetak
          </button> 
        </div>
      </td>
    </tr>
  </table>
</form></br>

<!-- Cetak buku yang sering dikembali-->
<!-- <form action="cetak/cetak_pengembalian_tanggal.php" method="GET">
  <table class="form-inline panel-body">
    <tr>
      <td>
      <?php
        $sql = $conn->query("SELECT ")
      ?>
        <div class="form-group">
          <input type="hidden" id="tglkembaliakhir" class="form-control datepicker" name="tglkembaliakhir">
        </div>
      </td>
      <td>
        <div class="form-group">
          <button class="btn btn-info" type="submit" id="cetak" name="cetak">
            <i class="ace-icon fa fa-check bigger-110"></i>
            Buku Yang Sering Di kembali
          </button> 
        </div>
      </td>
    </tr>
  </table>
</form> -->    
</div>
</div>
<script type="text/javascript">

  $(document).ready(function() {
    $('.datepicker').datetimepicker({
      format: 'DD-MM-YYYY'
    });
  });

</script>