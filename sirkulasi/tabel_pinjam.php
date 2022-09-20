 <?php
$trans_key = $_POST['trans_key'];
 $sql=$conn->query("SELECT
    `peminjaman_detail`.`idpinjamdetail` AS `p_idpinjamdetail`
    , `peminjaman_detail`.`jml` AS `p_jml`
    , `buku`.*
FROM
    `peminjaman_detail`
    INNER JOIN `buku` 
        ON (`peminjaman_detail`.`idbuku` = `buku`.`idbuku`) WHERE `peminjaman_detail`.`historykey` = '$trans_key'");
 $no=1;
 $jumlahtotal = 0;
 while($data=mysqli_fetch_array($sql))
 {
    ?>
        <tr class="baris_pinjam">
            <td id="no"><?php echo $no++;?></td>
            <td id="idbuku_tabel_<?php echo $data['p_idpinjamdetail'];?>" name="idbuku_tabelbuku" ><?php echo $data["idbuku"];?>
            <input id="idbuku_t" type="hidden" value="<?php echo $data["idbuku"];?>"/>
            </td>
            <td id="judul"><?php echo $data["judul"];?></td>
            <td id="pengarang"><?php echo $data["peng1"];?></td>
            <td id="qty_tabel_<?php echo $data['p_idpinjamdetail'];?>" name="qty_tabelbuku" ><?php echo $data["p_jml"];?>
            <input id="jml" type="hidden" value="<?php echo $data["p_jml"];?>"/>
            </td>
            <td><button id="hapus" onclick="hapus(<?php echo $data['p_idpinjamdetail']?>)">Hapus</button></td>
            <?php $jumlahtotal += $data["p_jml"];?>
        </tr>        
    <?php
}
?>
<tr>
   <td colspan="4">Jumlah Total</td>         
   <td id="jumlahtotal" colspan="2"><?php echo $jumlahtotal;?></td>         
</tr>
<tr>
    <td align="right"><button class="btn btn-success" type="button" onclick="simpanTransaksi()" id="simpantrans">
    <i class="glyphicon glyphicon-ok"></i>&nbsp;Simpan Pinjaman</button></td>
    <!-- <td colspan="6" align="left"><button type="button" onclick="print()" id="cetak">Cetak</button></td> -->
</tr>