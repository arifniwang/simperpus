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
      <a href="#"><span class="glyphicon glyphicon-book"></span> Cetak Peminjaman</a>
    </li>
  </ul>
</div>
<div class="panel panel-primary">
  <!-- Cetak peminjaman berdasarkan nama periode idanggota-->
  <div class="panel-heading">Cetak Peminjaman</div>

  <div class="panel-body">
    <form action="cetak/cetak_peminjaman_idanggota.php" method="GET" target="_blank">
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

    <!-- Cetak peminjaman berdasarkan nama anggota-->
<!--     <form action="cetak/cetak_peminjaman_namaanggota.php" method="GET" target="_blank">
      <table class="form-inline panel-body">
        <tr>
          <td class="form-group">
            <div class="form-group">
              <select class="form-control col-sm-5 chosen-select" name="idanggota" id="idanggota" required>
                <option value="">Pilih Nama Anggota</option>
                <?php
                $sql="SELECT 
                `peminjaman`.`idanggota`  as idanggota
                ,`anggota`.`nama` as nama
                FROM
                `simperpus`.`anggota`
                INNER JOIN `simperpus`.`peminjaman` 
                ON (`anggota`.`idanggota` = `peminjaman`.`idanggota`) group by idanggota";
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
    <!-- Cetak peminjaman berdasarkan tanggal pinjam-->
    <form action="cetak/cetak_peminjaman_tanggal.php" method="GET" target="_blank">
      <table class="form-inline panel-body">
        <td class="form-group">
          <div class="form-group">
           <input type="text" required="" placeholder="Tanggal Pinjam" id="tglpinjamawal" class="form-control datepicker" name="tglpinjamawal" >
         </div>
       </td>
       <td>&nbsp; s/d &nbsp;</td>
       <td>
        <div class="form-group">
          <input type="text" required="" placeholder="Tanggal Pinjam" id="tglpinjamakhir" class="form-control datepicker" name="tglpinjamakhir">
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

<!-- Cetak buku yang sering dipinjam-->
<!-- <form action="cetak/cetak_peminjaman_tanggal.php" method="GET">
  <table class="form-inline panel-body">
    <tr>
      <td>
      <?php
        $sql = $conn->query("SELECT ")
      ?>
        <div class="form-group">
          <input type="hidden" id="tglpinjamakhir" class="form-control datepicker" name="tglpinjamakhir">
        </div>
      </td>
      <td>
        <div class="form-group">
          <button class="btn btn-info" type="submit" id="cetak" name="cetak">
            <i class="ace-icon fa fa-check bigger-110"></i>
            Buku Yang Sering Di Pinjam
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