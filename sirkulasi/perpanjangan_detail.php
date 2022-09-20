 <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-user"></i>Detail Pinjam</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped table-bordered responsive">
         <thead>
          <tr>
            <th><center>No</center></th>
            <th><center>Judul Buku</center></th>
            <th><center>Pengarang</center></th>
            <th><center>Penerbit</center></th>
            <th><center>Quantity</center></th>
            <th><center>Tanggal Pinjam</center></th>
            <th><center>Harus Kembali</center></th>
            <th><center>Perpanjang</center></th>
            <!--<th><center>Denda</center></th> 
            <th><center>Potongan</center></th>
            <th><center>Jumlah Bayar</center></th> -->
          </tr>
        </thead>
        <tbody>
                      <?php
                      $no = 1;
                      $totalbayar=0;
                      include "../koneksi.php";
                      $historykey = $_GET['trans_key'];
                      $sql = $conn->query("SELECT
                        `peminjaman_detail`.jml as jml
                        ,`peminjaman_detail`.isperpanjang as isperpanjang
                        ,`peminjaman_detail`.tgldikembalikan as tgldikembalikan
                        ,`peminjaman_detail`.idpinjamdetail as idpinjamdetail
                        ,`peminjaman_detail`.denda as denda
                        ,`peminjaman_detail`.potongan as potongan
                        ,`peminjaman_detail`.tglhrskembali as tglhrskembali
                        ,`peminjaman`.tglpinjam as tglpinjam
                        ,`peminjaman`.totaldenda as totaldenda
                        ,`peminjaman`.historykey as historykey
                        ,`buku`.`judul` as b_judul
                        ,`buku`.`peng1` as b_pengarang
                        ,`penerbit`.`nama` as p_penerbit
                        FROM
                        `peminjaman_detail` 
                        INNER JOIN `buku` 
                        ON (`peminjaman_detail`.`idbuku` = `buku`.`idbuku`)
                        LEFT JOIN `penerbit` 
                        ON (`penerbit`.`idpenerbit` = `buku`.`penerbit`)
                        INNER JOIN `peminjaman`
                        ON(`peminjaman`.`historykey` = `peminjaman_detail`.`historykey`) where `peminjaman`.`historykey`='$historykey'");
             while ($data = mysqli_fetch_array($sql))
             {
               $perpanjangan = $data['isperpanjang'];
               $tglhrskembali = $data['tglhrskembali'];
               $tgldiperpanjang = strtotime('+1 week' , strtotime($tglhrskembali));
               $tgldikembalikan = $data['tgldikembalikan'];
               $denda = 0;
               $potongan = $data['potongan'];
               $totaldenda =$data['totaldenda'];
               ?>
               <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $data['b_judul'] ?></td>
                <td><?php echo $data['b_pengarang'] ?></td>
                <td><?php echo $data['p_penerbit'] ?></td>
                <td id="jml_<?php echo $data['idpinjamdetail'] ?>"><?php echo $data['jml'] ?></td>
                <td><?php echo trim(date('d-m-Y', strtotime( $data['tglpinjam']))) ?></td>
                <td><?php
                 if ($perpanjangan == 0) {
                   echo trim(date('d-m-Y', strtotime($tglhrskembali)));
                   ?>
                   <!-- <input type="hidden" id="tglhrskembali_<?php echo $data['idpinjamdetail']?>" name="idpinjamdetail" value="<?php echo date('Y-m-d', strtotime($tglhrskembali)) ?>" /> -->
                   <?php
                 };?>
               </td>
               <td><center>
                <?php 
                if ($perpanjangan == 0) {
                  ?>    
                  <input type="checkbox" value="1" id="perpanjangan_<?php echo $data['idpinjamdetail']?>" class="btn btn-sm btn-info" onclick="togglePerpanjangan(<?php echo $data['idpinjamdetail'] ?>)" />
                  <?php  
                }
                else{
                  echo $tgldiperpanjang;
                }
                ?>

                <input type="hidden" id="idpinjamdetail_<?php echo $data['idpinjamdetail']?>" name="idpinjamdetail" value="<?php echo $data['idpinjamdetail']?>" />
              </center>
            </td>

            <!--<td id="denda_<?php echo $data['idpinjamdetail'] ?>"></td>

             <td>
            <center>
              <input type="text" onkeyup="toggleDenda(<?php echo $data['idpinjamdetail'] ?>)" id="potongan_<?php echo $data['idpinjamdetail'] ?>" name="potongan" style="display: none; width:100px;"/>
            </center>
            </td>

            <td id="totaldenda_<?php echo $data['idpinjamdetail'] ?>">
              <input type="hidden" id="totaldenda_<?php echo $data['idpinjamdetail'] ?>"/>
            </td> -->

            </tr>
            <?php
            $no++;
            }
            ?>
        </tbody>
      </table>
    </div>
    <div class="modal-footer">
      <button class="btn btn-success" type="button" name="simpan" id="simpan" onclick="simpanperpanjangan(<?php echo $data['idpinjamdetail'];?>)">
      <i class="glyphicon glyphicon-ok"></i> Simpan
    </button>
    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
      <i class="glyphicon glyphicon-remove"></i>Keluar
    </button>
    </div>
  </div>


<script type="text/javascript">
$("#simpan").hide();
function togglePerpanjangan (id) {
    var status = $("#perpanjangan_" + id + ":checked").length;
    if (status == 1) {
      $("#simpan").show();  
    } else {
        $("#simpan").hide();
    };
}
function simpanperpanjang (id) {
      $.ajax({
        url:'sirkulasi/perpanjangan_simpan.php',
        type:'POST',
        data: {
           trans_key :window.trans_key,
           idpinjamdetail : $("#idpinjamdetail_"+ id).val(),
           tgldikembalikan : $("#tgldikembalikan_" + id).val(),
           denda : $("#denda_" + id).text(),
           potongan : $("#potongan_" + id).val(),
           totaldenda : $("#totaldenda_" + id).text()
        },
        success : function (respon) {
          $('#tbody').html(respon);
          setTimeout(function() {$('#modal_lihat').modal('hide');}, 1000);
        }
    })  
  };
</script>