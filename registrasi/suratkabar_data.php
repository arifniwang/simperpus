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
      <a href="#"><span class="glyphicon glyphicon-book"></span> Data Surat Kabar / Majalah</a>
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

  <div class="panel-heading">Data Surat Kabar / Majalah</div>

  <div class="panel-body">
    <div class="row">
    <div class="form-group col-sm-6">
      <button type="button" class="btn btn-success" onclick="openModal('tambah', '')"><span class="glyphicon glyphicon-plus"></span> Tambah</button>
    </div>
  </div>

    <div class="table-responsive">
      <table id="myTable" class="table table-bordered table-hover order-table">
        <thead style="background-color: #e8e8e8;">
          <tr>
            <th>No</th>
            <th>ID Majalah</th>
            <th>Nama</th>
            <th>Penerbit</th>
            <th>Kota</th>
            <th>ISSN</th>
            <th>Alamat</th>
            <th>Jenis</th>
            <th>Asal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="tbody">
          <?php include "suratkabar_tbody.php";?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal_surat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Surat Kabar / Majalah</h4>
      </div>
      <div class="modal-body">
        <form id="formID" class="form-horizontal">
          <div class="form-group">
            <label class="col-lg-3 control-label">ID Majalah</label>
            <div class="col-lg-5">
              <input style="width: 210px;" id="idmajalah" class="form-control" type="text" name="idmajalah" readonly />
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Nama</label>
            <div class="col-lg-5">
              <input style="width: 210px;"  class="form-control" type="text" name="nama" id="nama" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Penerbit</label>
            <div class="col-sm-5">
              <input style="width: 210px;"  class="form-control" type="text" name="penerbit" id="penerbit" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Kota</label>
            <div class="col-lg-5">
              <input style="width: 210px;"  class="form-control" type="text" name="kota" id="kota" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">ISSN</label>
            <div class="col-lg-5">
              <input style="width: 210px;"  class="form-control" type="text" name="issn" id="issn" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Alamat</label>
            <div class="col-lg-5">
              <textarea style="width: 250px;" class="form-control" type="textarea" name="alamat" id="alamat"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Jenis</label>
            <div class="col-sm-5">
              <select style="width: 250px;" class="form-control" name="jenis" id="jenis" required>
                <option value="">Pilih Jenis</option>
                <option value="majalah">MAJALAH</option>
                <option value="suratkabar">SURAT KABAR</option>
                <option value="tabloid">TABLOID</option>
              </select>
            </div>
          </div><div class="form-group">
          <label class="col-lg-3 control-label">Asal</label>
          <div class="col-sm-5">
            <select style="width: 250px;" class="form-control" name="idasal" id="idasal">
              <option value="">Pilih Asal</option>
              <?php

              $sql="select * from asalbuku";
              $qry= $conn->query($sql);
              while($data=mysqli_fetch_object($qry))
              {
                  //perulangan menampilkan data
                echo "<option value='".$data->idasal."'>".$data->asal."</option>";

              }
              ?>
            </select>
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

<div id="modal_delete_surat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
    window.idmajalah = id;
    $('#modal_surat').modal('show');

    if (tipe == "tambah") {
      $(".modal-body input,select,textarea").val("");
      $.ajax({
        url: "registrasi/suratkabar_cekidterakhir.php",
        type: "GET",
        contentType : "application/json",
        success: function (res){
          $("#idmajalah").val(res);
        }
      });
    } else if (tipe == "edit") {
      $.ajax({
        url: "registrasi/suratkabar_edit.php",
        type: "GET",
        contentType : "application/json",
        data : {"idmajalah": window.idmajalah},
        success: function (res){
          $("#idmajalah").val(res.idmajalah);
          $("#nama").val(res.nama);
          $("#penerbit").val(res.penerbit);
          $("#jenis").val(res.jenis);
          $("#idasal").val(res.idasal);
          $("#kota").val(res.kota);
          $("#alamat").val(res.alamat);
          $("#issn").val(res.issn);          
        }
      });
    } else {
      //perintah salah
      return false;
    };
  }

  function openDeleteModal (idmajalah) {
    window.idmajalah = idmajalah;
    $('#modal_delete_surat').modal('show');   
  }

  function hapus () {
    $.ajax({
      url: "registrasi/suratkabar_hapus.php",
      type: "POST",
      data : {idmajalah: window.idmajalah},
      success: function (res){
        $("#tbody").html(res);
        setTimeout(function() {$('#modal_delete_surat').modal('hide');}, 1000);
        $('#success_deleted_message').hide();
        $("#success_deleted_message").fadeIn("slow");
      }
    });
  }
  function simpan () {
    $.ajax({
      url: "registrasi/suratkabar_simpan.php",
      type: "POST",
      data : {
          perintah:window.perintah,
          id:window.idmajalah,
          idmajalah:$("#idmajalah").val(),
          nama: $("#nama").val(),
          penerbit:$("#penerbit").val(),
          jenis:$("#jenis").val(),
          idasal: $("#idasal").val(),
          kota:$("#kota").val(),
          alamat:$("#alamat").val(),
          issn:$("#issn").val()
      },
      success: function (res){
       $('#tbody').html(res);
       $("#success_deleted_message").hide();
       setTimeout(function() {$("#modal_surat").modal("hide");}, 1000);
       $("#success_save_message").fadeIn("slow");
      }
    });
  }

</script>