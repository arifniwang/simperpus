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
      <a href="#"><span class="glyphicon glyphicon-book"></span> Data Jenis Peminjam</a>
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

  <div class="panel-heading">Data Jenis Peminjam</div>

  <div class="panel-body">
    <div class="form-group">
      <button type="button" class="btn btn-success" onclick="openModal('tambah', '')"><span class="glyphicon glyphicon-plus"></span> Tambah</button>
    </div>

    <div class="table-responsive">
      <table id="myTable" class="table table-bordered table-hover">
        <thead style="background-color: #e8e8e8;">
          <tr>
            <th>No</th>
            <th>ID Peminjam</th>
            <th>Jenis Peminjam</th>
            <th>Biaya</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="tbody">
          <?php include "peminjam_tbody.php";?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal_peminjam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Data Jenis Peminjam</h4>
      </div>
      <div class="modal-body">
        <form id="formID" class="form-horizontal">
          <div class="form-group">
            <label class="col-lg-3 control-label">ID Peminjam</label>
            <div class="col-lg-5">
            <input style="width: 210px;"  class="form-control" type="text" name="idpeminjam" id="idpeminjam" placeholder="Id Peminjam" readonly/>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Jenis Peminjam</label>
            <div class="col-lg-5">
              <input style="width: 210px;"  class="form-control" type="text" name="jenispeminjam" id="jenispeminjam" placeholder="Jenis Peminjam" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Biaya</label>
            <div class="col-lg-5">
              <input style="width: 210px;"  class="form-control" type="text" name="biaya" id="biaya" placeholder="Biaya"/>
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

<div id="modal_delete_peminjam" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-user"></i> Hapus Data Buku</h4>
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
    window.idpeminjam = id;
    $('#modal_peminjam').modal('show');

    if (tipe == "tambah") {
      $("#idpeminjam").prop('readonly', true);
      $(".modal-body input").val("");
      $.ajax({
        url: "registrasi/peminjam_cekidterakhir.php",
        type: "GET",
        contentType : "application/json",
        success: function (res){
          $("#idpeminjam").val(res);
        }
      });
    } else if (tipe == "edit") {
      $("#idpeminjam").prop('readonly', true);
      $.ajax({
        url: "registrasi/peminjam_edit.php",
        type: "GET",
        contentType : "application/json",
        data : {"idpeminjam": window.idpeminjam},
        success: function (res){
          $("#idpeminjam").val(res.idpeminjam);
          $("#jenispeminjam").val(res.jenispeminjam);
          $("#biaya").val(res.biaya);
        }
      });
    } else {
      //perintah salah
      return false;
    };
  }

  function openDeleteModal (idpeminjam) {
    window.idpeminjam = idpeminjam;
    $('#modal_delete_peminjam').modal('show');   
  }

  function hapus () {
    $.ajax({
      url: "registrasi/peminjam_hapus.php",
      type: "POST",
      data : {idpeminjam: window.idpeminjam},
      success: function (res){
        $("#tbody").html(res);
        $('#modal_delete_peminjam').modal('hide');
        $('#success_deleted_message').hide();
        $("#success_deleted_message").fadeIn("slow");
      }
    });
  }
  function simpan () {
    $.ajax({
      url: "registrasi/peminjam_simpan.php",
      type: "POST",
      data : {
          perintah:window.perintah,
          id:window.idpeminjam,
          idpeminjam:$("#idpeminjam").val(),
          jenispeminjam:$("#jenispeminjam").val(),
          biaya:$("#biaya").val()
      },
      success: function (res){
       $('#tbody').html(res);
       $("#success_deleted_message").hide();
       setTimeout(function() {$("#modal_peminjam").modal("hide");}, 1000);
       $("#success_save_message").fadeIn("slow");
      }
    });
  }

</script>