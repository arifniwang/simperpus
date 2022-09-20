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

  <div class="panel-heading">Cetak Buku</div>

  <div class="panel-body">
      <form action="cetak/cetak_buku_idbuku.php" method="GET" target="_blank">
        <table class="form-inline panel-body">
        <tr>
          <td class="form-group">
            <select class="form-control col-sm-5 chosen-select" name="idbukuawal" id="idbukuawal" required>
              <option value="">Pilih Buku</option>
              <?php

              $sql="select * from buku";
              $qry=mysqli_query($conn,$sql);
              while($data=mysqli_fetch_object($qry))
              {
                                      //perulangan menampilkan data
                echo "<option value='".$data->idbuku."'>".$data->idbuku." | ".$data->judul."</option>";                                             
              }
              ?>
            </select>
          </td>
          <td>&nbsp; s/d &nbsp;</td>
          <td class="form-group">
            <select class="form-control col-sm-5 chosen-select" name="idbukuakhir" id="idbukuakhir" required>
              <option value="">Pilih Buku</option>
              <?php
              $sql="select * from buku";
              $qry=mysqli_query($conn,$sql);
              while($data=mysqli_fetch_object($qry))
              {
                                      //perulangan menampilkan data
                echo "<option value='".$data->idbuku."'>".$data->idbuku." | ".$data->judul."</option>";                                             
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

    <form action="cetak/cetak_buku_tglpengadaan.php" method="GET" target="_blank">
      <table class="form-inline panel-body">
        <tr>
          <td class="form-group">
            <div class="form-group">
             <input type="text" required="" placeholder="Tanggal Pengadaan" id="tglpengadaanawal" class="form-control datepicker" name="tglpengadaanawal" >
           </div>
         </td>
         <td>&nbsp; s/d &nbsp;</td>
         <td class="form-group">
          <div class="form-group">
            <input type="text" required="" placeholder="Tanggal Pengadaan" id="tglpengadaanakhir" class="form-control datepicker" name="tglpengadaanakhir">
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

  <!-- <form action="cetak/cetak_buku_tglinput.php" method="GET" target="_blank">
    <table class="form-inline panel-body">
      <td class="form-group">
        <div class="form-group">
         <input type="text" required="" placeholder="Tanggal Input" id="tglinputawal" class="form-control datepicker" name="tglinputawal" >
       </div>
     </td>
     <td>&nbsp; s/d &nbsp;</td>
     <td class="form-group">
      <div class="form-group">
        <input type="text" required="" placeholder="Tanggal Input" id="tglinputakhir" class="form-control datepicker" name="tglinputakhir">
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
  </form>     -->
</div>
</div>
 <script type="text/javascript">

  $(document).ready(function() {
    $('.datepicker').datetimepicker({
      format: 'DD-MM-YYYY'
    });
  });

</script>