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
      <a href="#"><span class="glyphicon glyphicon-book"></span> Data Serial Surat Kabar / Majalah</a>
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

  <div class="panel-heading">Data Serial Surat Kabar / Majalah</div>

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
            <th>ID Edisi</th>
            <th>ID Majalah</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Volume</th>
            <th>Bulan</th>
            <th>Kopi Ke</th>
            <th>Tahun</th>
            <th>Harga</th>
            <th>Musim</th>
            <th>Tgl Pengadaan</th>
            <th>Cover</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="tbody">
          <?php include "koran_tbody.php";?>
        </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="modal_koran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Data Serial Surat Kabar / Majalah</h4>
        </div>
        <div class="modal-body">
          <form action="?dt=simpansuratkabar" class="form-horizontal" method="POST">
            <div class="form-group">
              <label class="col-lg-3 control-label">ID Edisi</label>
              <div class="col-lg-5">
                <input style="width: 210px;"  class="form-control" type="text" name="idedisi" id="idedisi" disabled="" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Id Majalah</label>
              <div class="col-sm-5">
                <select style="width: 250px;" class="form-control" name="idmajalah" id="idmajalah">
                  <option value="">Pilih Id Majalah</option>
                  <?php
                  $sql="select * from majalah";
                  $qry= $conn->query($sql);
                  while($data=mysqli_fetch_object($qry))
                  {
                  //perulangan menampilkan data
                    echo "<option value='".$data->idmajalah."' data-nama='".$data->nama."' data-jenis='".$data->jenis."'>".$data->idmajalah." | ".$data->nama."</option>";

                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Nama</label>
              <div class="col-lg-5">
                <input style="width: 210px;"  class="form-control" type="text" name="nama" id="nama" readonly="" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Jenis</label>
              <div class="col-lg-5">
                <input style="width: 210px;"  class="form-control" type="text" name="jenis" id="jenis" readonly="" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Volume</label>
              <div class="col-lg-5">
                <input style="width: 210px;"  class="form-control" type="text" name="volume" id="volume" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Bulan</label>
              <div class="col-lg-5">
                <input style="width: 210px;"  class="form-control" type="text" name="bulan" id="bulan" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Kopi Ke -</label>
              <div class="col-lg-5">
                <input style="width: 210px;"  class="form-control" type="text" name="kopike" id="kopike" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">No</label>
              <div class="col-lg-5">
                <input style="width: 210px;"  class="form-control" type="text" name="no" id="no" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Tahun</label>
              <div class="col-lg-5">
                <input style="width: 210px;"  class="form-control" type="text" name="tahun" id="tahun" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Harga</label>
              <div class="col-lg-5">
                <input style="width: 210px;"  class="form-control" type="text" name="harga" id="harga" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Musim</label>
              <div class="col-sm-5">
                <select style="width: 250px;" class="form-control" name="musim" id="musim">
                  <option value="">Pilih Musim</option>
                  <option value="kemarau">Kemarau</option>
                  <option value="hujan">Hujan</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Tgl Pengadaan</label>
              <div class="col-lg-5">
                <input style="width: 210px;"  class="form-control datepicker" type="text" name="tglpengadaan" id="tglpengadaan" />
              </div>
            </div>
          </form>
          <form class="form-horizontal" style="display: none">
            <div class="form-group">
              <label for="upload_cover" class="col-sm-2 control-label">Upload Cover</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="upload_cover" name="upload_cover"/>
              </div>
            </div>
          </form>
          <form id="upload_form" class="form-inline" enctype="multipart/form-data">
          <label class="col-lg-2 control-label">Cover</label>
            <div class="form-group">
              <img id="uploadPreview" style="width: 150px; height: 150px;" alt="Preview" >
            </div>
            <div class="form-group">
              <input class="form-control" type="file" id="cover" name="cover" onchange="PreviewImage()" >
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

<div id="modal_delete_koran" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-user"></i> Hapus Data Serial Surat Kabar / Majalah</h4>
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
    $('.datepicker').datetimepicker({
      format: 'DD-MM-YYYY'
    })
  })

  function uploadTriger () {
    $('#upload_button').click();
  }

  $("#upload_form").on('submit', (function(e) {
    e.preventDefault();
    if (document.getElementById("cover").files.length == 0) {
      simpan();
    } else {
      var file_data = $('#cover').prop('files')[0];
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
          $("#upload_cover").val(res);
          simpan();
        }
      });
    };
  }))

  function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("cover").files[0]);
    oFReader.onload = function (oFREvent) {
      document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
  };

  function openModal(tipe, id) {
    window.perintah = tipe;
    window.idedisi = id;
    $("#success_message").hide();
    $('#modal_koran').modal('show');
    $("#uploadPreview").attr("src", "");

    if (tipe == "tambah") {
      $(".modal-body input,select,textarea").val("");
      $.ajax({
        url: "registrasi/koran_cekidterakhir.php",
        type: "GET",
        contentType : "application/json",
        success: function (res){
          $("#idedisi").val(res);
        }
      });
    } else if (tipe == "edit") {
      $("#cover").val("");
      $.ajax({
        url: "registrasi/koran_edit.php",
        type: "GET",
        contentType : "application/json",
        data : {idedisi: window.idedisi},
        success: function (res){
          $("#idedisi").val(res.idedisi);
          $("#idmajalah").val(res.idmajalah);
          $("#volume").val(res.volume);
          $("#bulan").val(res.bulan);
          $("#kopike").val(res.kopike);
          $("#no").val(res.no);
          $("#tahun").val(res.tahun);
          $("#harga").val(res.harga);
          $("#musim").val(res.musim);
          $("#tglpengadaan").val(res.tglpengadaan);
          $("#upload_cover").val(res.cover);
          $("#uploadPreview").attr("src", "./images/" + res.cover);
          
        }
      });
    } else {
      //perintah salah
      return false;
    };
  }

  function openDeleteModal (idedisi) {
    window.idedisi = idedisi;
    $('#modal_delete_koran').modal('show');   
  }

  function hapus () {
    $.ajax({
      url: 'registrasi/koran_hapus.php',
      type: 'post',
      data: {idedisi: window.idedisi},
      success: function (res) {
        $("#tbody").html(res);
        $('#modal_delete_koran').modal('hide');
        $('#success_save_message').hide();
        $("#success_deleted_message").fadeIn("slow");
      }
    });
  }

  function simpan () {
    $.ajax({
      url: 'registrasi/koran_simpan.php',
      type: 'post',
      data: {
        perintah:window.perintah,
        id:window.idedisi,
          idedisi:$("#idedisi").val(),
          idmajalah:$("#idmajalah").val(),
          volume:$("#volume").val(),
         bulan:$("#bulan").val(),
         kopike:$("#kopike").val(),
          no:$("#no").val(),
          tahun:$("#tahun").val(),
          harga:$("#harga").val(),
          musim:$("#musim").val(),
          tglpengadaan:$("#tglpengadaan").val(),
          upload_cover:$("#upload_cover").val(),
      },
      success: function (res) {
        $("#tbody").html(res);
        $("#success_message").fadeIn("slow");
        $("#success_deleted_message").hide();
        setTimeout(function() {$('#modal_koran').modal('hide');}, 1000);
        $("#success_save_message").fadeIn("slow");
      }
    });
    
  }

  function fungsi_idmajalah () {
      var selected = $('#idmajalah').find('option:selected');
      var pilih_nama = String(selected.data('nama'));
      var pilih_jenis = String(selected.data('jenis'));
     $("#nama").val(pilih_nama);
      $("#jenis").val(pilih_jenis);
    };
    $('#idmajalah').change(function(){
    fungsi_idmajalah();
  });
</script>