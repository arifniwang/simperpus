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
      <a href="#"><span class="glyphicon glyphicon-home"></span> Home</a>
    </li>
    <li>
      <a href="#"><span class="glyphicon glyphicon-book"></span> Data Peminjaman Buku</a>
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
<div id="success_kembali_message" class="alert alert-success fade in alert-dismissable" style="display: none">
  <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
  <strong><i class="glyphicon glyphicon-ok"></i>&nbsp; Sukses</strong> Buku Telah Dikembalikan.
</div>
<div id="success_perpanjang_message" class="alert alert-success fade in alert-dismissable" style="display: none">
  <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
  <strong><i class="glyphicon glyphicon-ok"></i>&nbsp; Sukses</strong> Buku Telah Diperpanjang.
</div>
<div class="panel panel-primary">

  <div class="panel-heading">Data Peminjaman Buku</div>

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
            <th><center>Nama Anggota</center></th>
            <th><center>Status</center></th>
            <th style="width:10%;"><center>Total Pinjam</center></th>
            <!-- <th><center>Tanggal Pinjam</center></th> -->
            <th style="width:10%;"><center>Max Pinjam</center></th>
            <th style="width:10%;"><center>Tanggungan</center></th>
            <th style="width:10%;"><center>Durasi</center></th> 
            <!-- <th><center>Denda</center></th>
            <th><center>Potongan</center></th>
            <th><center>Total Bayar</center></th>  -->
            <th width="10%"><center>Aksi</center></th>
          </tr>
        </thead>
        <tbody id="tbody">
          <?php include "peminjaman_tbody.php";?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<div id="modal_peminjaman" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="z-index:100;">
      <div class="modal-header">
        <button type="button" class="close" onclick="tutup()">&times;</button>
        <h4 class="modal-title">Tambah Data Peminjaman</h4>
      </div>
      <div class="modal-body">
        <?php 
              // membuat query max untuk kode barang
              $cari_kd=$conn->query("select max(idpinjam) as id from peminjaman"); //mencari kode yang paling besar atau kode yang baru masuk
              $tm_cari=mysqli_fetch_array($cari_kd);
              $kode=substr($tm_cari['id'],-1); //mengambil string mulai dari karakter pertama 'A' dan mengambil 4 karakter setelahnya. 
              $tambah=$kode+1; //kode yang sudah di pecah di tambah 1
              $trans_key =substr(md5(microtime(date("Y/m/d"))), -5);
              ?>
              <form id="form" name="form" class="form-horizontal">
                <div class="form-group">
                  <label class="col-md-4 col-xs-4 control-label">ID Pinjam</label>
                  <div class="col-xs-10 col-sm-5">
                    <input type="text" placeholder="ID Transaksi" id="idpinjam" class="form-control" name="idpinjam" value="<?php echo str_replace("/","",date("Y/m/d"))."-".$tambah;?>" Readonly/>
                    <input type="hidden" placeholder="ID Transaksi" id="trans_key" class="form-control" name="trans_key" value="<?php echo $trans_key;?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 col-xs-4 control-label">ID Anggota</label>
                  <div class="col-xs-10 col-sm-5">
                    <select class="col-xs-10 col-sm-5 form-control" name="idanggota" id="idanggota" required>
                      <option value="">Pilih Anggota</option>
                      <?php

                      $sql=$conn->query("SELECT
                        `anggota`.`idanggota`
                        ,`anggota`.`nama`
                        ,`jenispeminjam`.`jenispeminjam` AS j_peminjam
                        FROM
                        `jenispeminjam`
                        INNER JOIN `anggota` 
                        ON (`jenispeminjam`.`idpeminjam` = `anggota`.`status`)");
                      while($dt=mysqli_fetch_object($sql))
                      {
                                                    //perulangan menampilkan data
                        echo "<option value='".$dt->idanggota."' data-nama='".$dt->nama."' data-status='".$dt->j_peminjam."'>".$dt->idanggota."</option>";

                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 col-xs-4 control-label">Nama Anggota</label>
                  <div class="col-xs-10 col-sm-5">
                    <input type="text" placeholder="Nama Anggota" id="namaanggota" class="form-control" name="namaanggota" readonly=""/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 col-xs-4 control-label">Status</label>
                  <div class="col-xs-10 col-sm-5">
                    <input type="text" required="" placeholder="Status" id="status" class="form-control" name="status" readonly=""/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 col-xs-4 control-label">Tanggal Pinjam</label>
                  <div class="col-xs-10 col-sm-5">
                    <input type="text" name="tglpinjam" id="tglpinjam" placeholder="Tanggal Jual" class="form-control date-picker" value="<?php echo date("Y-m-d"); ?>" Readonly/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 col-xs-4 control-label">Tanggal Kembali</label>
                  <div class="col-xs-10 col-sm-5">
                    <input type="text" name="tglkembali" id="tglkembali" placeholder="Tanggal Kembali" class="form-control date-picker" Readonly/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 col-xs-4 control-label">Judul Buku</label>
                  <div class="col-xs-10 col-sm-5">
                   <select class="col-xs-10 col-sm-5 form-control" name="idbuku" id="idbuku" onchange="cekjumlah()" required>
                    <option value="">Pilih Buku</option>
                    <?php

                    $sql=$conn->query("SELECT * FROM buku where jumlah > 0");
                    while($dt=mysqli_fetch_object($sql))
                    {
                                                    //perulangan menampilkan data
                      echo "<option value='".$dt->idbuku."' data-stok='".$dt->jumlah."'>".$dt->judul."</option>";

                    }
                    ?>
                  </select>
                  <input id="jumlahbuku" type="hidden">
                  <label id="jumlahbuku_label" style="display:none">Jumlah Buku Yang Tersedia</label>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 col-xs-4 control-label">Quantity</label>
                <div class="col-xs-10 col-sm-5">
                  <input type="text" required="" placeholder="Quantity" id="qty" class="form-control" name="qty" required>
                </div>
              </div>
            </form>
            <div class="form-group" align="center"><button type="button" onclick="tambahPinjam()" class="btn btn-info" id="simpan" name="simpan">Tambah</button></div>
            <div class="table-responsive">
              <table class="table table-striped table-bordered responsive">
               <thead>
                <tr>
                  <th>No</th>
                  <th>Id Buku</th>
                  <th>Judul Buku</th>
                  <th>Pengarang</th>
                  <th>Quantity</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody id="tbody2">

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Lihat -->
  <div id="modal_lihat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

      <div class="modal-content" style="z-index:1;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="glyphicon glyphicon-user"></i>Detail Pinjam</h4>
        </div>
        <div class="modal-body">
          <table class="table table-striped table-bordered responsive">
           <thead>
            <tr>
              <th><center>
               No. 
             </center></th>
             <th><center>Judul Buku</center></th>
             <th><center>Pengarang</center></th>
             <th><center>Penerbit</center></th>
             <th><center>Quantity</center></th>
             <th><center>Tgl Pinjam</center></th>
             <th><center>Tgl Harus Kembali</center></th>
             <th><center>Perpanjang</center></th>
             <th><center>Pengembalian</center></th>
           </tr>
         </thead>
         <tbody id="tbody3">

         </tbody>
       </table>
     </div>
     <div class="modal-footer">
      <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Keluar</button>
    </div>
  </div>
</div>
</div>

<!--Modal perpanjangan-->
<div id="modal_perpanjang" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-user"></i> Perpanjangan Buku</h4>
      </div>
      <div class="modal-body">
        Apakah anda yakin akan memperpanjang buku ini?
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger" type="button" name="hapus" onclick="perpanjang()">
          <i class="glyphicon glyphicon-trash"></i>&nbsp; Ya
        </button>
        <button class="btn btn-sm btn-default" data-dismiss="modal" aria-hidden="true">
          <i class="glyphicon glyphicon-remove"></i>&nbsp; Batal
        </button>
      </div>
    </div>
  </div>
</div>

<!--Modal Hapus Pinjam-->
<div id="modal_hapus_pinjam" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-user"></i> Hapus Peminjaman</h4>
      </div>
      <div class="modal-body">
        Apakah anda yakin akan menghapus data ini?
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger" type="button" name="hapus" onclick="hapuspinjam()">
          <i class="glyphicon glyphicon-trash"></i>&nbsp; Ya
        </button>
        <button class="btn btn-sm btn-default" data-dismiss="modal" aria-hidden="true">
          <i class="glyphicon glyphicon-remove"></i>&nbsp; Batal
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Pengembalian -->
<div id="modal_pengembalian" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="z-index:100;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pengembalian Buku</h4>
      </div>
      <div class="modal-body">
        <form id="form_pengembalian" name="form_pengembalian" class="form-horizontal">


        </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="simpanPengembalian()" class="btn btn-success" id="simpankembali" name="simpankembali">Simpan</button>
        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Keluar</button>
      </div>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function (){
    window.perintah = '';
    var tgl_akhir = $("#tglakhir").val();
    var pinjam = $("#tglpinjam").val();
    var kembali = moment(pinjam).add(7,'days');
    var format_akhir = moment(tgl_akhir).format('DD-MM-YYYY');
    var format_pinjam = moment(pinjam).format('DD-MM-YYYY');
    var format_kembali = moment(kembali).format('DD-MM-YYYY');
    $("#tglakhir").val(format_akhir);
    $("#tglkembali").val(format_kembali);
    $("#tglpinjam").val(format_pinjam);
    $('.datepicker').datetimepicker({
      format: 'DD-MM-YYYY'
    });
  });


  function simpanTransaksi () {
    if (window.perintah == 'tambah') {
      var trans_key = $("#trans_key").val();
    }
    else {
      var trans_key = window.transkey;
    };

    $.ajax({
      url:'sirkulasi/simpanpinjam.php',
      type:'POST',
      data: {
        perintah : window.perintah,
        idpinjam  : $('#idpinjam').val(),
        idanggota   : $('#idanggota').val(),
        tglpinjam : $("#tglpinjam").val(),
        total     : $("#jumlahtotal").text(),
        trans_key   :trans_key,
      }, success : function (respon) {
        setTimeout(function() {$('#modal_peminjaman').modal('hide');}, 1000);
        $('#success_deleted_message').hide();
        $('#success_kembali_message').hide();
        $('#success_save_message').show();
        window.location.reload();
      }
    })
  };


  function openModal(tipe, id) {
    window.perintah = tipe;
    window.transkey = id;


    if (window.perintah == "tambah") {
      $("#idanggota").val("");
      $('#idbuku').val("");
      $('#namaanggota').val("");
      $('#status').val("");
      $("#qty").val("");
      $("#tbody2").html("");
    }else if (window.perintah == "ubah") {
      $.ajax({
        url:'sirkulasi/tabel_pinjam.php',
        type:'POST',
        data: {
          "trans_key" : window.transkey
        },
        success : function (respon) {
          getDetail(window.transkey);
          $('#tbody2').html(respon);
        }
      })
    } else {
      return false;
    };
    setTimeout(function() {
      $('#modal_peminjaman').modal('show');
    }, 1000);
  }

  function getDetail(oo) {
   $.ajax({
    url: "sirkulasi/peminjaman_getdata.php",
    type: "GET",
    contentType : "application/json",
    data : {trans_key: oo},
    success: function (res){
      var tglpinjam = moment(res.tglpinjam).format('DD-MM-YYYY');
      var tglhrskembali = moment(res.tglhrskembali).format('DD-MM-YYYY');
      $("#idpinjam").val(res.idpinjam);
      $('#idanggota').val(res.idanggota);
      $('#namaanggota').val(res.nama);
      $('#status').val(res.kelas);
      $("#tglpinjam").val(tglpinjam);
      $("#tglkembali").val(tglhrskembali);
    }
  });
 }



 function tambahPinjam () {
  var buku = $('#idbuku').val();
  var kurang = $('#qty').val();
  var jumlah_awal = $('#idbuku option[value="' + buku + '"]').data('stok');
  var jumlah_akhir = jumlah_awal - kurang;

  if (buku == "" || kurang == "") {
    alert("Silahkan Isi Form Judul Buku Dan Jumlah Pinjam Buku");
    return false;
  };

  if ($("#qty").val() <= $("#jumlahbuku").val()) {

    if (window.perintah == 'tambah') {
      var trans_key = $("#trans_key").val();
    }
    else {
      var trans_key = window.transkey;
    };
    $('#idbuku option[value="' + buku + '"]').data('stok', jumlah_akhir);

    $.ajax({
      url:'sirkulasi/tambahpinjam.php',
      type:'POST',
      data: {
        idbuku : $('#idbuku').val(),
        jumlah : $("#qty").val(),
        tglkembali : $("#tglkembali").val(),
        trans_key : trans_key,
      }, success : function (respon) {
        $('#tbody2').html(respon);
        $("#idbuku").val("");
        $("#qty").val("");
        $("#jumlahbuku_label").hide();
      }
    })
  }else {
    alert("Jumlah Buku Tidak Mencukupi");
    return false;
  };
};

function hapus (id) {
 if (window.perintah == 'tambah') {
  var trans_key = $("#trans_key").val();
}
else {
  var trans_key = window.transkey;
};
$.ajax({
  url:'sirkulasi/hapuspinjam.php',
  type:'POST',
  data: {
    idhapus : id,
    qty : $('#jml').val(),
    idbuku : $("#idbuku_t").val(),
    trans_key :trans_key,
  }, success : function (respon) {
    var buku = Number($('#idbuku_tabel_'+id).text());
    var kurang = Number($('#qty_tabel_'+id).text());
    var jumlah_awal = Number($('#idbuku option[value="' + buku + '"]').data('stok'));
    var jumlah_akhir = Number(jumlah_awal + kurang);
    $('#idbuku option[value="' + buku + '"]').data('stok', jumlah_akhir);
    $("#idbuku").val("");
    $("#qty").val("");
    $("#jumlahbuku_label").hide();
    $('#tbody2').html(respon);
  }
})
};


function rincian (e) {
  window.trans_key = e;
  setTimeout(function() {$('#modal_lihat').modal('show');}, 1000);
  $.ajax({
    url:'sirkulasi/peminjaman_detail.php',
    type:'POST',
    data: {
      "trans_key" : window.trans_key
    },
    success : function (respon) {
      $('#tbody3').html(respon);
    }
  })  
};

function anggota () {
  var selected = $('#idanggota').find('option:selected');
  var nama = String(selected.data('nama'));
  var kelas = String(selected.data('status'));
  $("#namaanggota").val(nama);
  $("#status").val(kelas);
};
$('#idanggota').change(function(){
  anggota();
});

function togglePerpanjangan (ar) {
  window.idpinjamdetail = ar;
  setTimeout(function() {$("#modal_perpanjang").modal('show');}, 1000);
}
function perpanjang () {
 $.ajax({
  url:'sirkulasi/perpanjangan_simpan.php',
  type:'POST',
  data: {
    idpinjamdetail : window.idpinjamdetail,
    trans_key : window.trans_key,
  },
  success : function (respon) {
    $('#tbody3').html(respon);
    setTimeout(function() {$("#modal_perpanjang").modal('hide');}, 1000);
  }
})
}


function tgldikembalikan (k) {
  window.idpinjamdetail = k;
  setTimeout(function() {$("#modal_pengembalian").modal('show');}, 1000);
  $.ajax({
    url:'sirkulasi/pengembalian_data.php',
    type:'POST',
    data: {
      "idpinjamdetail" : window.idpinjamdetail
    },
    success : function (respon) {
      $('#form_pengembalian').html(respon);
    }
  })  
};

function simpanPengembalian() {
  $.ajax({
    url:'sirkulasi/pengembalian_simpan.php',
    type:'POST',
    data: {
      "idpinjamdetail" : $("#idpinjamdetail").val()
      ,"jmlpinjambuku" : $("#jmlpinjambuku").val()
      ,"idbuku_kembali" : $("#idbuku_kembali").val()
      ,"trans_key"     : $("#historykey").val()
      ,"tgldikembalikan" : $("#tglbukudikembalikan").val()
      ,"denda" : $("#denda").val()
      ,"potongan" : $("#potongan").val()
      ,"totalbayar" : $("#totalbayar").val()
    },
    success : function (respon) {
      setTimeout(function() {$("#modal_pengembalian").modal('hide');}, 1000);
     location.reload();
    }
  })  
}

function cekjumlah () {
  var selected = $('#idbuku').find('option:selected');
  var jumlahbuku = Number(selected.data('stok'));
  $("#jumlahbuku").val(jumlahbuku);
  $("#jumlahbuku_label").html("Jumlah Buku Yang Tersedia " + jumlahbuku);
  $("#jumlahbuku_label").show();

}
function tutup () {
 var baris = $(".baris_pinjam").length;
 if (baris > 0) {
  alert("Silahkan Hapus Data Pinjam Terlebih Dahulu")
  return false;
 }else{
  $("#modal_peminjaman").modal("hide");
 };
}
function openDelete (idpinjam) {
  window.idpinjam = idpinjam;
  setTimeout(
      function() {
          $("#modal_hapus_pinjam").modal('show');
        }, 1000);
  }
function hapuspinjam () {
   $.ajax({
  url:'sirkulasi/peminjaman_hapus.php',
  type:'POST',
  data: {
    idpinjam : window.idpinjam,
  },
  success : function (respon) {
    $('#tbody').html(respon);
    setTimeout(function() {$("#modal_hapus_pinjam").modal('hide');}, 1000);
  }
})
}
</script>
