<div>
  <ul class="breadcrumb">
    <li>
      <a href="#"><span class="glyphicon glyphicon-home"></span> Home</a>
    </li>
    <li>
      <a href="#"><span class="glyphicon glyphicon-book"></span> History Peminjaman Pengembalian</a>
    </li>
  </ul>
</div>
<div class="panel panel-primary">

  <div class="panel-heading">Data Peminjaman Buku</div>

  <div class="panel-body">
    <div class="row">
    <div class="form-group col-sm-6">
      
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
          <?php include "history_tbody.php";?>
        </tbody>
        </table>
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
            <th><center>Denda</center></th>
            <th><center>Potongan</center></th>
            <th><center>Sub Total</center></th>
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
        if (tipe == "tambah") {
          $("#idanggota").val("");
          $('#idbuku').val("");
          $('#namaanggota').val("");
          $('#status').val("");
          $("#qty").val("");
          $("#tbody2").html("");
        }
      } else if (window.perintah == "ubah") {
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
      setTimeout(function() {$('#modal_peminjaman').modal('show');}, 1000);
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
      if (window.perintah == 'tambah') {
      var trans_key = $("#trans_key").val();
      }
      else {
        var trans_key = window.transkey;
      };
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
                        }
                    })
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
                            qty : $("#qty").val(),
                            idbuku : $("#idbuku").val(),
                            trans_key :trans_key,
                        }, success : function (respon) {
                         
                            $('#tbody2').html(respon);
                        }
                    })
                };

   
   function rincian (e) {
    window.trans_key = e;
    setTimeout(function() {$('#modal_lihat').modal('show');}, 1000);
    $.ajax({
      url:'sirkulasi/history_detail.php',
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
      $("#modal_perpanjang").modal('hide');
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
  </script>
