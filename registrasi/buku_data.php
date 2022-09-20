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
      <a href="#"><span class="glyphicon glyphicon-book"></span> Data Buku</a>
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
  <div class="panel-heading">Data Buku</div>

  <div class="panel-body">
    <div class="row">
      <div class="form-group col-sm-6">
        <button type="button" class="btn btn-success" onclick="openModal('tambah', '')"><span class="glyphicon glyphicon-plus"></span> Tambah</button>
      </div>
    </div>
    <div class="table-responsive">
      <table id="myTable" class="table table-bordered table-hover order-table">
        <thead style="background-color: #e8e8e8;">
          <tr align="center">
            <th>Id Buku</th>
            <th>Accnumber</th>
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Letak</th>
            <th>Kondisi</th>
            <th>Jumlah Buku</th>
            <th>Ket.</th>
            <th width="10%">Aksi</th>
          </tr>
        </thead>
        <tbody id="tbody">
          <?php include "buku_tbody.php";?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal_buku" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Buku</h4>
      </div>
      <div class="modal-body">
        <form id="formID" class="form-horizontal">
          <div class="form-group">
            <label class="col-lg-4 control-label">Id Buku</label>
            <div class="col-lg-5">
              <input style="width: 250px;" class="form-control" onchange="getAccNumber()" type="text" name="idbuku" id="idbuku" placeholder="Id Buku" />
              <input style="width: 250px;" class="form-control" type="hidden" name="tglinput" id="tglinput" value="<?php echo date('d-m-Y');?>" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Judul</label>
            <div class="col-lg-5">
              <input style="width: 250px;" class="form-control" type="text" name="judul" id="judul" onkeyup="kdjudul(this.value)" placeholder="Judul Buku" required/>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Kode Judul</label>
            <div class="col-lg-5">
              <input style="width: 250px;" class="form-control" type="text" name="idjudul" id="idjudul" placeholder="Kode Judul" readonly/>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Klasifikasi</label>
            <div class="col-lg-5">
            <select style="width: 250px;" class="form-control" name="idklass" id="idklass" onchange="jenisbuku(this.value)" required>
                <option value="">Pilih Klasifikasi</option>
                <?php

                $sql="select * from klasifikasi";
                $qry= $conn->query($sql);
                while($data=mysqli_fetch_object($qry))
                {
                  //perulangan menampilkan data
                  echo "<option value='".$data->idklasifikasi."'>".$data->klasifikasi."</option>";

                }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Jenis</label>
            <div class="col-lg-5">
              <select style="width: 250px;" class="form-control" name="idjenis" id="idjenis" onchange="letak()" placeholder="Jenis Buku" required>
                <option value="">Pilih Jenis</option>
              
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Letak</label>
            <div class="col-lg-5">
              <input style="width: 250px;" class="form-control" type="text" name="idletak" id="idletak" placeholder="Letak Buku" readonly="" />
            </div>
          </div>
          <!-- <div class="form-group">
            <label class="col-lg-4 control-label">Kode Letak</label>
            <div class="col-lg-5">
              <input style="width: 250px;" class="form-control" type="text" name="idletak" id="idletak" readonly/>
            </div>
          </div> -->
          <div class="form-group">
            <label class="col-lg-4 control-label">Pengarang</label>
            <div class="col-lg-5">
              <input style="width: 250px;" class="form-control" type="text" name="pengarang" id="pengarang" onkeyup="kdpeng(this.value)" placeholder="Pengarang" required/>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Kode Pengarang</label>
            <div class="col-lg-5">
              <input style="width: 250px;" class="form-control" type="text" name="idpeng" id="idpeng" placeholder="Kode Pengarang" readonly />
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-lg-4 control-label">Penerbit</label>
            <div class="col-lg-5">
              <select style="width: 250px;" class="form-control" name="idpenerbit" id="idpenerbit" onchange="penerbit()">
                <option value="">Pilih Penerbit</option>
                <?php
                $sql="select * from penerbit";
                $qry= $conn->query($sql);
                while($data=mysqli_fetch_object($qry))
                {
                  //perulangan menampilkan data
                  echo "<option value='".$data->idpenerbit."' data-tahun='".$data->tahun."'>".$data->nama."</option>";

                }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Penerjemah</label>
            <div class="col-lg-5">
              <input style="width: 250px;" class="form-control" type="text" name="penerjemah" id="penerjemah" placeholder="Penerjemah"/>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Editor</label>
            <div class="col-lg-5">
              <input style="width: 250px;" class="form-control" type="text" name="editor" id="editor" placeholder="Editor"/>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Tim</label>
            <div class="col-lg-5">
              <input style="width: 250px;" class="form-control" type="text" name="tim" id="tim" placeholder="Tim"/>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Volume</label>
            <div class="col-lg-5">
              <input style="width: 250px;" class="form-control" type="text" name="volume" id="volume" placeholder="Volume"/>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Edisi</label>
            <div class="col-lg-5">
              <input style="width: 250px;" class="form-control" type="text" name="edisi" id="edisi" placeholder="Edisi"/>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Cetakan</label>
            <div class="col-lg-5">
              <input style="width: 250px;" class="form-control" type="text" name="cetakan" id="cetakan" placeholder="Cetakan"/>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Kopi Ke- </label>
            <div class="col-lg-5">
              <input style="width: 250px;" class="form-control" type="text" name="kopike" id="kopike" placeholder="Kopi ke"/>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Bahasa</label>
            <div class="col-lg-5">
              <select style="width: 250px;" class="form-control" name="idbahasa" id="idbahasa" placeholder="Bahasa" required>
                <option value="">Pilih Bahasa</option>
                <?php

                $sql="select * from bahasa";
                $qry= $conn->query($sql);
                while($data=mysqli_fetch_object($qry))
                {
                  //perulangan menampilkan data
                  echo "<option value='".$data->idbahasa."'>".$data->bahasa."</option>";

                }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Asal</label>
            <div class="col-lg-5">
              <select style="width: 250px;" class="form-control" name="idasal" id="idasal" onchange="getAccNumber()" placeholder="Asal Buku" required>
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
          <div class="form-group">
            <label class="col-lg-4 control-label">Anotasi</label>
            <div class="col-lg-5">
              <textarea style="width: 250px;" class="form-control" type="textarea" name="notasi" id="notasi" placeholder="Anotasi"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Kota</label>
            <div class="col-lg-5">
              <select style="width: 250px;" class="form-control" name="idkota" id="idkota" placeholder="Kota">
                <option value="">Pilih Kota</option>
                <?php

                $sql="select * from kota";
                $qry= $conn->query($sql);
                while($data=mysqli_fetch_object($qry))
                {
                  //perulangan menampilkan data
                  echo "<option value='".$data->idkota."'>".$data->kota."</option>";

                }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Tahun</label>
            <div class="col-lg-5">
              <input style="width: 250px;"  class="form-control" type="text" name="tahun" id="tahun" readonly="" placeholder="Tahun"/>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Harga</label>
            <div class="col-lg-5">
              <input style="width: 250px;"  class="form-control" type="text" name="harga" id="harga" placeholder="Harga"/>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Tgl Pengadaan</label>
            <div class="col-lg-5">
              <input style="width: 250px;" type="text" class="form-control datepicker" name="pengadaan" id="pengadaan" onclick="getAccNumber()" placeholder="Tanggal Pengadaan"/>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Kondisi</label>
            <div class="col-lg-5">
              <select style="width: 250px;" class="form-control" name="kondisi" id="kondisi" placeholder="Kondisi" required>
                <option value="">Pilih Kondisi</option>
                <?php

                $sql="select * from kondisi";
                $qry= $conn->query($sql);
                while($data=mysqli_fetch_object($qry))
                {
                  //perulangan menampilkan data
                  echo "<option value='".$data->idkondisi."'>".$data->kondisi."</option>";

                }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Jumlah Buku</label>
            <div class="col-lg-5">
              <input style="width: 250px;" type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah Buku"/>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Ket.</label>
            <div class="col-lg-5">
              <select style="width: 250px;" class="form-control" name="ket" id="ket" placeholder="Kondisi" required>
                <option value="">Pilih Keterangan</option>
                <option value="Dapat Dipinjam">Dapat Dipinjam</option>
                <option value="Tidak Dapat Dipinjam">Tidak Dapat Dipinjam</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-4 control-label">Accnumber</label>
            <div class="col-lg-5">
              <input style="width: 250px;" class="form-control" type="text" name="accnumber" id="accnumber" readonly/>
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

<div id="modal_delete_buku" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
    window.idbuku = id;
    $('#modal_buku').modal('show');

    if (tipe == "tambah") {
    $("#idbuku").prop('readonly', false);
      $("#idbuku").val("");
      $("#idletak").val("");
      $("#pengarang").val("");
      $("#idpeng").val("");
      $("#judul").val("");
      $("#idjudul").val("");
      $("#idklass").val("");
      $("#idpenerbit").val("");
      $("#penerjemah").val("");
      $("#editor").val("");
      $("#tim").val("");
      $("#volume").val("");
      $("#edisi").val("");
      $("#cetakan").val("");
      $("#kopike").val("");
      $("#idjenis").val("");
      $("#idbahasa").val("");
      $("#idasal").val("");
      $("#notasi").val("");
      $("#idkota").val("");
      $("#tahun").val("");
      $("#harga").val("");
      $("#pengadaan").val("");
      $("#kondisi").val("");
      $("#jumlah").val("");
      $("#ket").val("");
      $("#accnumber").val("");
     /* $.ajax({
        url: "registrasi/buku_cekidterakhir.php",
        type: "GET",
        contentType : "application/json",
        success: function (res){
          $("#idbuku").val(res);
        }
      });*/
    } else if (tipe == "edit") {
      $("#idbuku").prop('readonly', true);
      $.ajax({
        url: "registrasi/buku_edit.php",
        type: "GET",
        contentType : "application/json",
        data : {"idbuku": window.idbuku},
        success: function (res){
          $("#idbuku").val(res.idbuku);
          $("#idletak").val(res.idletak);
          $("#pengarang").val(res.peng1);
          $("#idpeng").val(res.idpeng);
          $("#judul").val(res.judul);
          $("#idjudul").val(res.idjudul);
          $("#idklass").val(res.idklass);
          $("#idpenerbit").val(res.idpenerbit);
          $("#penerjemah").val(res.penerjemah);
          $("#editor").val(res.editor);
          $("#tim").val(res.tim);
          $("#volume").val(res.volume);
          $("#edisi").val(res.edisi);
          $("#cetakan").val(res.cetakan);
          $("#kopike").val(res.kopike);
          $("#idjenis").val(res.idjenis);
          $("#idbahasa").val(res.idbahasa);
          $("#idasal").val(res.idasal);
          $("#notasi").val(res.notasi);
          $("#idkota").val(res.idkota);
          $("#tahun").val(res.tahun);
          $("#harga").val(res.harga);
          $("#pengadaan").val(res.pengadaan);
          $("#kondisi").val(res.kondisi);
          $("#jumlah").val(res.jumlah);
          $("#ket").val(res.ket);
          $("#accnumber").val(res.accnumber);
        }
      });
} else {
      //perintah salah
      return false;
    };
  }

  function openDeleteModal (idbuku) {
    window.idbuku = idbuku;
    $('#modal_delete_buku').modal('show');   
  }

  function hapus () {
    $.ajax({
      url: "registrasi/buku_hapus.php",
      type: "POST",
      data : {id: window.idbuku},
      success: function (res){
        $("#tbody").html(res);
        $('#modal_delete_buku').modal('hide');
        $('#success_deleted_message').hide();
        $("#success_deleted_message").fadeIn("slow");
      }
    });
  }
  function simpan () {
    $.ajax({
      url: "registrasi/buku_simpan.php",
      type: "POST",
      data : {
        perintah:window.perintah,
        id:window.idbuku,
        idbuku:$("#idbuku").val(),
        tglinput:$("#tglinput").val(),
        idletak:$("#idletak").val(),
        pengarang:$("#pengarang").val(),
        idpeng:$("#idpeng").val(),
        judul:$("#judul").val(),
        idjudul:$("#idjudul").val(),
        idklass:$("#idklass").val(),
        idpenerbit:$("#idpenerbit").val(),
        penerjemah:$("#penerjemah").val(),
        editor:$("#editor").val(),
        tim:$("#tim").val(),
        volume:$("#volume").val(),
        edisi:$("#edisi").val(),
        cetakan :$("#cetakan").val(),
        kopike:$("#kopike").val(),
        idjenis:$("#idjenis").val(),
        idbahasa:$("#idbahasa").val(),
        idasal:$("#idasal").val(),
        notasi:$("#notasi").val(),
        idkota:$("#idkota").val(),
        tahun:$("#tahun").val(),
        harga:$("#harga").val(),
        pengadaan:$("#pengadaan").val(),
        kondisi:$("#kondisi").val(),
        jumlah:$("#jumlah").val(),
        ket:$("#ket").val(),
        accnumber:$("#accnumber").val()
      },
      success: function (res){
       $('#tbody').html(res);
       $("#success_deleted_message").hide();
       setTimeout(function() {$("#modal_buku").modal("hide");}, 1000);
       $("#success_save_message").fadeIn("slow");
     }
   });
}

function kdjudul (kd) {
 var jud = $("#judul").val();
 $("#idjudul").val(jud.charAt(0));
};
function kdpeng (peng) {
 var penga = $("#pengarang").val();
 $("#idpeng").val(penga.substr($("#pengarang").text(),3));
};
/* function rak () {
      $("#idletak").val($("#letak").val());
  };*//*
 function book (book) {
   var idbuku = $("#idbuku").val();
   $("#accnumber").val(idbuku);
 }
 function tgl (penga) {
   var pengadaan = $("#pengadaan").val();
   $("#accnumber").val(pengadaan.substr($("#pengadaan").text(),4));
 };
 function asal (a) {
   var asal = $("#idasal").val();
   $("#accnumber").val(asal);
 };*/
 function getAccNumber(){
  var asal = $("#idasal").val();
  var semplit = $("#pengadaan").val().split('-');
  var idbuku = $("#idbuku").val();
  var accnumber = idbuku+"/"+asal+"/"+semplit[2];
  $("#accnumber").val(accnumber);
}
function penerbit () {
 var selected = $('#idpenerbit').find('option:selected');
 var tahun = Number(selected.data('tahun'));

 $('#tahun').val(tahun);
 
}

function jenisbuku (jenisbuku) {
  $.ajax({
      url: "registrasi/getjenisbuku.php",
      type: "POST",
      data : {
        idklasifikasi : jenisbuku,
      }, success: function (res){
        $("#idjenis").html(res);
     letak();
      }
    });
}
function letak () {
  var klasifikasi = $('#idklass').val();
        var jenisbuku = $('#idjenis').val();
        var letak = klasifikasi+'.'+jenisbuku;
        $("#idletak").val(letak);
}
$(document).ready(function() {
  $('.datepicker').datetimepicker({
    format: 'DD-MM-YYYY'
  })
})
</script>