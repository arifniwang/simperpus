<?php
include "../koneksi.php";
$idpinjamdetail = $_POST['idpinjamdetail'];
$sql = $conn->query("SELECT
  `peminjaman_detail`.jml as jml
  ,`peminjaman_detail`.isperpanjang as isperpanjang
  ,`peminjaman_detail`.idpinjamdetail as idpinjamdetail
  ,`peminjaman`.tglpinjam as tglpinjam
  ,`peminjaman_detail`.tglhrskembali as tglhrskembali
  ,`peminjaman`.historykey as historykey
  ,`buku`.`idbuku` as b_idbuku
  ,`buku`.`judul` as b_judul
  ,`buku`.`peng1` as b_pengarang
  ,`penerbit`.`nama` as p_penerbit
  ,`jenispeminjam`.`biaya` as j_biaya
  FROM
`simperpus`.`peminjaman_detail`
  INNER JOIN `simperpus`.`buku` 
      ON (`peminjaman_detail`.`idbuku` = `buku`.`idbuku`)
  INNER JOIN `simperpus`.`penerbit` 
      ON (`buku`.`idpenerbit` = `penerbit`.`idpenerbit`)
  INNER JOIN `simperpus`.`peminjaman` 
      ON (`peminjaman`.`historykey` = `peminjaman_detail`.`historykey`)
  INNER JOIN `simperpus`.`anggota` 
      ON (`anggota`.`idanggota` = `peminjaman`.`idanggota`)
  INNER JOIN `simperpus`.`jenispeminjam` 
      ON (`jenispeminjam`.`idpeminjam` = `anggota`.`status`) where `peminjaman_detail`.`idpinjamdetail` = '$idpinjamdetail'");
$data = mysqli_fetch_array($sql);
$perpanjangan = $data['isperpanjang'];
$tglhrskembali = date('Y-m-d', strtotime($data['tglhrskembali']));
$tgldiperpanjang = date('Y-m-d',strtotime('+1 week' , strtotime($data['tglhrskembali'])));

?>

<div class="form-group">
  <label class="col-md-4 col-xs-4 control-label">Jumlah Pinjam</label>
  <div class="col-xs-10 col-sm-5">
    <input type="text" placeholder="Jumlah Pinjam Buku" id="jmlpinjambuku" class="form-control" name="jmlpinjambuku" value="<?php echo $data['jml'] ?>" readonly=""/>
    <input type="hidden" id="idpinjamdetail" class="form-control" name="idpinjamdetail" value="<?php echo $idpinjamdetail ?>" readonly=""/>
    <input type="hidden" id="historykey" class="form-control" name="historykey" value="<?php echo $data['historykey'] ?>" readonly=""/>
    <input type="hidden" id="idbuku_kembali" class="form-control" name="idbuku_kembali" value="<?php echo $data['b_idbuku'] ?>" readonly=""/>
    <input type="hidden" id="biaya" class="form-control" name="biaya" value="<?php echo $data['j_biaya'] ?>" readonly=""/>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 col-xs-4 control-label">Tgl Pinjam</label>
  <div class="col-xs-10 col-sm-5">
    <input type="text" placeholder="Tanggal Pinjam Buku" id="tglpinjambuku" class="form-control" name="tglpinjambuku" value="<?php echo date('Y-m-d', strtotime($data['tglpinjam'])) ?>" readonly=""/>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 col-xs-4 control-label">Tgl Harus Kembali</label>
  <div class="col-xs-10 col-sm-5">
    <?php if ($perpanjangan == 0): ?>
      <input type="text" placeholder="Tanggal Harus Kembali" id="tglbukuhrskembali" class="form-control" value="<?php echo $tglhrskembali ?>" name="tglbukuhrskembali" readonly=""/>
    <?php else : ?>  
      <input type="text" placeholder="Tanggal Harus Kembali" id="tglbukuhrskembali" class="form-control" value="<?php echo $tgldiperpanjang ?>" name="tglbukuhrskembali" readonly=""/>
    <?php endif ?>    
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 col-xs-4 control-label">Tgl Dikembalikan</label>
  <div class="col-xs-10 col-sm-5">
    <input type="text" name="tglbukudikembalikan" id="tglbukudikembalikan" value="<?php echo date('Y-m-d');?>" placeholder="Tanggal Jual" class="form-control" readonly="" />
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 col-xs-4 control-label">Denda</label>
  <div class="col-xs-10 col-sm-5">
    <input type="text" name="denda" id="denda" class="form-control" Readonly/>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 col-xs-4 control-label">Potongan</label>
  <div class="col-xs-10 col-sm-5">
    <input type="text" id="potongan" onkeyup="toggleDenda()" class="form-control" name="potongan">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 col-xs-4 control-label">Total Denda</label>
  <div class="col-xs-10 col-sm-5">
    <input type="text" id="totaldenda" class="form-control" name="totaldenda" readonly="">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 col-xs-4 control-label">Total Bayar</label>
  <div class="col-xs-10 col-sm-5">
    <input type="text" id="totalbayar" class="form-control" name="totalbayar" readonly="">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 col-xs-4 control-label">Bayar</label>
  <div class="col-xs-10 col-sm-5">
    <input type="text" id="bayar" class="form-control" onkeyup="hitungkembalian(this.value)" name="bayar">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 col-xs-4 control-label">Uang Kembalian</label>
  <div class="col-xs-10 col-sm-5">
    <input type="text" id="kembalian" class="form-control" name="kembalian" readonly="" style="color:red;"/>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
      $('#simpankembali').hide();
      toggleDenda();
    });

    function toggleDenda () {
        var tgldikembalikan = $("#tglbukudikembalikan").val();
        var tglhrskembali =$("#tglbukuhrskembali").val();
        var denda =$("#biaya").val();
        var jml = $("#jmlpinjambuku").val();

            if (tglhrskembali > tgldikembalikan) {
                var ttldenda = 0
                $("#denda").val(ttldenda);
                $('#simpankembali').show();
                $('#potongan').hide();
                $('#bayar').hide();
            } else {
                var a, b, c, ttldenda;
                a = moment(tgldikembalikan);
                b = moment(tglhrskembali);
                c = a.diff(b, 'days');
                ttldenda = c * denda;
                $("#denda").val(ttldenda);
            };

        var total_denda = ($("#denda").val() * jml);
        var total_bayar = ($("#denda").val() * jml) - $("#potongan").val();
        $("#totaldenda").val(total_denda);
        $("#totalbayar").val(total_bayar);
    }

    function hitungkembalian (aa) {
      var kembalian = Number($('#totalbayar').val() - aa)
      if (kembalian < 0) 
            {
                $('#kembalian').val("Rp." +Math.abs(kembalian));
                $('#simpankembali').show();
            }
      else if(kembalian == 0)
            {
                $('#kembalian').val("Uang Pass !!");
                $('#simpankembali').show();
            }
      else{
            $('#kembalian').val("Dilarang Ngutang !!");
            $('#simpankembali').hide();
      };
    };
</script>