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
      <a href="#"><span class="glyphicon glyphicon-book"></span> Cetak Denda</a>
    </li>
  </ul>
</div>
<div class="panel panel-primary">
  <!-- Cetak denda berdasarkan nama periode idanggota-->
  <div class="panel-heading">Cetak denda</div>

  <div class="panel-body">
    <!-- Cetak denda berdasarkan tanggal denda-->
    <form action="cetak/cetak_denda_tanggal.php" method="GET" target="_blank">
      <table class="form-inline panel-body">
        <td class="form-group">
          <div class="form-group">
           <input type="text" required="" placeholder="Tanggal denda" id="tgldendaawal" class="form-control datepicker" name="tgldendaawal" >
         </div>
       </td>
       <td>&nbsp; s/d &nbsp;</td>
       <td>
        <div class="form-group">
          <input type="text" required="" placeholder="Tanggal denda" id="tgldendaakhir" class="form-control datepicker" name="tgldendaakhir">
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
<!-- <form action="cetak/cetak_denda_tanggal.php" method="GET">
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