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
      <a href="#"><span class="glyphicon glyphicon-book"></span> Cetak Buku</a>
    </li>
  </ul>
</div>
<div class="panel panel-primary">

  <div class="panel-heading">Cetak Anggota</div>

  <div class="panel-body">
      <form action="cetak/cetak_anggota_idanggota.php" method="GET" target="_blank">
        <table class="form-inline panel-body">
        <tr>
          <td class="form-group">
            <select class="form-control col-sm-5 chosen-select" name="idanggotaawal" id="idanggotaawal" required>
              <option value="">Pilih Anggota</option>
              <?php

              $sql="select * from anggota";
              $qry=mysqli_query($conn,$sql);
              while($data=mysqli_fetch_object($qry))
              {
                                      //perulangan menampilkan data
                echo "<option value='".$data->idanggota."'>".$data->idanggota." | ".$data->nama."</option>";                                             
              }
              ?>
            </select>
          </td>
          <td>&nbsp; s/d &nbsp;</td>
          <td class="form-group">
            <select class="form-control col-sm-5 chosen-select" name="idanggotaakhir" id="idanggotaakhir" required>
              <option value="">Pilih Anggota</option>
              <?php
              $sql="select * from anggota";
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

<!--     <form action="cetak/cetak_anggota_namaanggota.php" method="GET" target="_blank">
      <table class="form-inline panel-body">
        <tr>
          <td class="form-group">
            <div class="form-group">
              <select class="form-control col-sm-5 chosen-select" name="idanggota" id="idanggota" required>
              <option value="">Pilih Nama Anggota</option>
              <?php
              $sql="select * from anggota";
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
  </form> </br> -->

<form action="cetak/cetak_anggota_statusanggota.php" method="GET" target="_blank">
    <table class="form-inline panel-body">
      <td class="form-group">
        <div class="form-group">
          <select class="form-control col-sm-5 chosen-select" name="status" id="status" required>
              <option value="">Pilih Status Anggota</option>
              <?php
              $sql="SELECT * from jenispeminjam";
              $qry=mysqli_query($conn,$sql);
              while($data=mysqli_fetch_object($qry))
              {
                                      //perulangan menampilkan data
                echo "<option value='".$data->idpeminjam."'>".$data->jenispeminjam."</option>";                                             
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
  </form>   
</div>
</div>
 <script type="text/javascript">

  $(document).ready(function() {
    $('.datepicker').datetimepicker({
      format: 'DD-MM-YYYY'
    });
  });

</script>