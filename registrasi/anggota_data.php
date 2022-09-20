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
      <a href="#"><span class="glyphicon glyphicon-book"></span> Data Anggota</a>
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

  <div class="panel-heading">Data Anggota</div>

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
            <th><center>No</center></th>
            <th><center>Id Anggota</center></th>
            <th><center>Nama</center></th>
            <th><center>Status</center></th>
            <th><center>Kelas</center></th>
            <th><center>Jenis Kelamin</center></th>
            <th><center>Alamat Rumah</center></th>
            <th><center>TTL</center></th>
            <th><center>Telp</center></th>
            <th><center>Masa Berlaku</center></th>
            <th><center>Foto</center></th> 
            <th width="10%"><center>Aksi</center></th>
          </tr>
        </thead>
        <tbody id="tbody">
          <?php include "anggota_tbody.php"; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Modal -->
<div id="modal_anggota" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Data Anggota</h4>
      </div>

      <div class="modal-body">
        <form id="form_anggota" class="form-horizontal" enctype="multipart/form-data">
          <div class="form-group">
            <label class="col-lg-4 control-label">Id Anggota</label>
            <div class="col-lg-5">
              <input style="width: 210px;"  class="form-control" type="text" name="idanggota" id="idanggota" placeholder="P00.000" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Nama</label>
            <div class="col-lg-5">
              <input style="width: 210px;"  class="form-control" type="text" name="nama" id="nama" placeholder="Nama" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Status</label>
            <div class="col-lg-5">
              <select style="width: 210px;" class="form-control" name="status" id="status" onchange="getkelas(this.value)" placeholder="Status"/>
              <option value="">Pilih Status</option>
              <?php
                     
            $sql=$conn->query("SELECT * from jenispeminjam");
            while($data=mysqli_fetch_object($sql))
            {
//perulangan menampilkan data
              echo "<option value='".$data->idpeminjam."' >".$data->jenispeminjam."</option>";

            }
            ?>
              
            </select>
          </div>
        </div>
        <div class="form-group" id="idkelas">
          <label class="col-lg-4 control-label">Kelas</label>
          <div class="col-lg-5">
           <select style="width: 210px;" class="form-control" name="kelas" id="kelas" placeholder="Kelas" required>
            <option value="">Pilih Kelas</option>
            <?php

            $sql=$conn->query("SELECT * from kelas");
            while($data=mysqli_fetch_object($sql))
            {
//perulangan menampilkan data
              echo "<option value='".$data->idkelas."' >".$data->kelas."</option>";

            }
            ?>
          </select>
        </div>
      </div>
      <!-- <div class="form-group">
        <label class="col-lg-4 control-label">Alamat Sekolah</label>
        <div class="col-lg-5">
          <input style="width: 210px;"  class="form-control" type="text" name="alamatsekolah" id="alamatsekolah" placeholder="Alamat Sekolah"/>
        </div>
      </div> -->

      <div class="form-group">
        <label for="jeniskel" class="col-lg-4 control-label">Jenis Kelamin</label>
        <div class="col-lg-5">
          <select style="width: 210px;" class="form-control" name="jeniskel" id="jeniskel" placeholder="Jenis Kelamin"/>
          <option value="">Pilih Jenis Kelamin</option>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-4 control-label">Alamat Rumah</label>
      <div class="col-lg-5">
        <input style="width: 210px;"  class="form-control" type="text" name="alamat" id="alamat" placeholder="Alamat Rumah"/>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-4 control-label">Tanggal Lahir</label>
      <div class="col-lg-5">
        <input style="width: 210px;"  class="form-control datepicker" type="text" name="tgllahir" id="tgllahir" placeholder="Tanggal Lahir"/>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-4 control-label">Telp</label>
      <div class="col-lg-5">
        <input maxlength="13" style="width: 210px;"  class="form-control" type="text" name="telp" id="telp" placeholder="Telp"/>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-4 control-label">Masa Berlaku</label>
      <div class="col-lg-5">
        <input style="width: 210px;"  class="form-control datepicker" type="text" name="masaberlaku" id="masaberlaku" placeholder="Masa Berlaku"/>
      </div>
    </div>
  </form>
  <form class="form-horizontal" style="display: none">
    <div class="form-group">
      <label for="upload_foto" class="col-lg-4 control-label">Upload Foto</label>
      <div class="col-lg-5">
        <input type="text" class="form-control" id="upload_foto" name="upload_foto"/>
      </div>
    </div>
  </form>
  <form id="upload_form" class="form-horizontal" enctype="multipart/form-data">
    <label class="col-lg-4 control-label">Foto</label>
    <div class="form-group">
      <img id="uploadPreview" class="col-lg-4" style="width: 180px; height: 150px;" alt="Preview" >
    </div>
    <div class="form-group"><label class="col-lg-4"></label>
      <input class="form-horizontal col-lg-4" style="width: 230px;" type="file" id="foto" name="foto" onchange="PreviewImage()" >
    </div>
    <button id="upload_button" style="display: none" type="submit">Submit</button>
  </form>
  <div id="success_message" class="alert alert-success fade in alert-dismissable" style="margin-top: 18px; display: none">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Sukses</strong> Data Berhasil disimpan.
  </div>
</div>
<div class="modal-footer">
  <button class="btn btn-success" type="submit" name="simpan" onclick="uploadTriger()">
    <i class="glyphicon glyphicon-ok"></i> Simpan
  </button>
  <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
    <i class="glyphicon glyphicon-remove"></i>Keluar
  </button>
</div>

</div>
</div>
</div>
</div>

<div id="modal_delete_anggota" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-user"></i> Hapus Data Anggota</h4>
      </div>
      <div class="modal-body">
        Apakah anda yakin akan menghapus ini?
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

  $(document).ready(function() {
    window.perintah = "";
    window.idanggota = "";
    $("#idkelas").hide();
    $('.datepicker').datetimepicker({
      format: 'DD-MM-YYYY'
    })
  })

  function uploadTriger () {
    $('#upload_button').click();
  }

  $("#upload_form").on('submit', (function(e) {
    e.preventDefault();
    if (document.getElementById("foto").files.length == 0) {
      simpan();
    } else {
      var file_data = $('#foto').prop('files')[0];
      var form_data = new FormData();                  
      form_data.append('file', file_data);
      $.ajax({
        url: 'registrasi/upload.php', // point to server-side PHP script 
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'POST',
        success: function(res){
          $("#upload_foto").val(res);
          simpan();
        }
      });
    };
  }))

  function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("foto").files[0]);
    oFReader.onload = function (oFREvent) {
      document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
  };

  function openModal(tipe, id) {
    window.perintah = tipe;
    window.idanggota = id;
    $("#success_message").hide();
    $('#modal_anggota').modal('show');
    $("#uploadPreview").attr("src", "");

    if (tipe == "tambah") {
      $("#idanggota").prop('readonly', false);
      $(".modal-body input,select,textarea").val("");
      /*$.ajax({
        url: "registrasi/anggota_cekidterakhir.php",
        type: "GET",
        contentType : "application/json",
        success: function (res){
          $("#idanggota").val(res);
        }
      });*/
    } else if (tipe == "edit") {
      $("#idanggota").prop('readonly', true);
    	$("#foto").val("");
      $.ajax({
        url: "registrasi/anggota_edit.php",
        type: "GET",
        contentType : "application/json",
        data : {idanggota: window.idanggota},
        success: function (res){
          $("#idanggota").val(res.idanggota);
          $("#nama").val(res.nama);
          $("#status").val(res.status);
          $("#kelas").val(res.kelas);
         /* $("#alamatsekolah").val(res.alamat_sekolah);*/
          $("#jeniskel").val(res.jeniskel);
          $("#alamat").val(res.alamat);
          $("#tgllahir").val(res.tgllahir);
          $("#telp").val(res.telp);
          $("#masaberlaku").val(res.masaberlaku);
          $("#upload_foto").val(res.foto);
          $("#uploadPreview").attr("src", "./images/" + res.foto);
          
        }
      });
    } else {
      //perintah salah
      return false;
    };
  }

  function openDeleteModal (idanggota) {
    window.idanggota = idanggota;
    $('#modal_delete_anggota').modal('show');   
  }

  function hapus () {
    $.ajax({
      url: 'registrasi/anggota_hapus.php',
      type: 'post',
      data: {id: window.idanggota},
      success: function (res) {
        $("#tbody").html(res);
        $('#modal_delete_anggota').modal('hide');
        $('#success_save_message').hide();
        $("#success_deleted_message").fadeIn("slow");
      }
    });
  }

  function simpan () {
    $.ajax({
      url: 'registrasi/anggota_simpan.php',
      type: 'post',
      data: {
        perintah:window.perintah,
        id:window.idanggota,
        idanggota: $("#idanggota").val(),
        nama: $("#nama").val(),
        status: $("#status").val(),
        kelas: $("#kelas").val(),
        /*alamatsekolah: $("#alamatsekolah").val(),*/
        jeniskel: $("#jeniskel").val(),
        alamat: $("#alamat").val(),
        tgllahir: $("#tgllahir").val(),
        telp: $("#telp").val(),
        masaberlaku: $("#masaberlaku").val(),
        upload_foto: $("#upload_foto").val()
      },
      success: function (res) {
        if (res == "Ada") {
          alert("Id Anggota Sudah Ada");
          return false;
        }else{
        $("#tbody").html(res);
        $("#success_message").fadeIn("slow");
        $("#success_deleted_message").hide();
        setTimeout(function() {$('#modal_anggota').modal('hide');}, 1000);
        $("#success_save_message").fadeIn("slow");
        };
      }
    });
    
  }

  function getkelas (idkelas) {
    if (idkelas==1) {
          $("#idkelas").show();
    }
    else {
      $("#idkelas").hide();
    }
  }

</script>