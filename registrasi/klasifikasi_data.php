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
      <a href="#"><span class="glyphicon glyphicon-book"></span> Data Klasifikasi Buku</a>
    </li>
  </ul>
</div>
<div id="success_deleted_message" class="alert alert-success fade in alert-dismissable" style="display: none">
  <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
  <strong><i class="glyphicon glyphicon-trash"></i>&nbsp; Sukses</strong> Data Berhasil dihapus.
</div>
<div id="success_save_message" class="alert alert-success fade in alert-dismissable" style="display: none">
  <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
  <strong><i class="glyphicon glyphicon-ok"></i>&nbsp; Sukses</strong> Data Berhasil disimpan.
</div>
<div class="panel panel-primary">

  <div class="panel-heading">Data Klasifikasi Buku</div>

  <div class="panel-body">
    <div class="form-group">
      <button type="button" class="btn btn-success" onclick="openModal('tambah', '')"><span class="glyphicon glyphicon-plus"></span> Tambah</button>
    </div>

    <div class="table-responsive">
      <table id="myTable" class="table table-bordered table-hover">
        <thead style="background-color: #e8e8e8;">
          <tr>
            <th>No</th>
            <th>Id Klasifikasi</th>
            <th>Klasifikasi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="tbody">
          <?php include "klasifikasi_tbody.php";?>
        </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="modal_klasifikasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Data Klasifikasi Buku</h4>
        </div>
        <div class="modal-body">
          <form id="formID" class="form-horizontal">
          <div class="form-group">
              <label class="col-lg-3 control-label">Id Klasifikasi</label>
              <div class="col-lg-5">
                <input style="width: 210px;"  class="form-control" type="text" name="idklasifikasi" id="idklasifikasi" placeholder="Id klasifikasi"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Klasifikasi</label>
              <div class="col-lg-5">
                <input style="width: 210px;"  class="form-control" type="text" name="klasifikasi" id="klasifikasi" placeholder="klasifikasi"/>
              </div>
            </div>
          <div class="modal-footer">
            <button class="btn btn-success" type="button" onclick="simpan()">Simpan</button>
            <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Keluar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div id="modal_delete_klasifikasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-user"></i> Hapus Data Klasifikasi</h4>
      </div>
      <div class="modal-body">
        Apakah anda yakin akan menghapus data ini?
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger" type="button" name="hapus" onclick="hapus()">
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

function openModal(tipe, id) {
    window.perintah = tipe;
    window.idklasifikasi = id;
    $('#modal_klasifikasi').modal('show');

    if (tipe == "tambah") {
  $("#idklasifikasi").prop('readonly', false);
      $(".modal-body input").val("");/*
      $.ajax({
        url: "registrasi/klasifikasi_cekidterakhir.php",
        type: "GET",
        contentType : "application/json",
        success: function (res){
          $("#idklasifikasi").val(res);
        }
      });*/
    } else if (tipe == "edit") {
      $("#idklasifikasi").prop('readonly', true);
      $.ajax({
        url: "registrasi/klasifikasi_edit.php",
        type: "GET",
        contentType : "application/json",
        data : {idklasifikasi: window.idklasifikasi},
        success: function (res){
          $("#idklasifikasi").val(res.idklasifikasi);
          $("#klasifikasi").val(res.klasifikasi);
        }
      });
    } else {
      //perintah salah
      return false;
    };
  }

  function openDeleteModal (id) {
    window.idklasifikasi = id;
    $('#modal_delete_klasifikasi').modal('show');   
  }

  function hapus () {
    $.ajax({
      url: "registrasi/klasifikasi_hapus.php",
      type: "POST",
      data : {id: window.idklasifikasi},
      success: function (res){
        $("#tbody").html(res);
        location.reload();
        setTimeout(function() {$('#modal_delete_klasifikasi').modal('hide');}, 500);
        
      }
    });
  }
  function simpan () {
    $.ajax({
      url: "registrasi/klasifikasi_simpan.php",
      type: "POST",
      data : {
          perintah:window.perintah,
          idklasifikasi:$("#idklasifikasi").val(),
          klasifikasi:$("#klasifikasi").val(),
      },
      success: function (res){
       $('#tbody').html(res);
       $("#success_deleted_message").hide();
       location.reload();
       setTimeout(function() {$("#modal_klasifikasi").modal("hide");}, 500);
       /*$("#success_save_message").fadeIn("slow");*/
      }
    });
  }

</script>