<?php
//memulai menggunakan mpdf
// Tentukan path yang tepat ke mPDF
$nama_dokumen='Laporan Buku Berdasarkan ID Buku'; //Beri nama file PDF hasil.
define('_MPDF_PATH','../mpdf/'); // Tentukan folder dimana anda menyimpan folder mpdf
include(_MPDF_PATH . "mpdf.php"); // Arahkan ke file mpdf.php didalam folder mpdf
$mpdf=new mPDF('utf-8', 'A4-L', 12, 'times'); // Membuat file mpdf baru
//Memulai proses untuk menyimpan variabel php dan html
ob_start();
include "../koneksi.php";
$tglkembaliawal = date('Y-m-d', strtotime($_GET['tglkembaliawal']));
$tglkembaliakhir = date('Y-m-d', strtotime($_GET['tglkembaliakhir']));
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<head>
<title></title>  
</head>  
<body> 
<div align="center">
<table width="1000" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="76" rowspan="4" align="center"><img src="../images/logo-demak-4.png" alt="" width="69" height="92"></td>
    <td width="1000" height="19">&nbsp;</td>
  </tr>
  <tr>
    <td height="0" align="center" style="font-size: 36px; font-weight: bold;">SEKOLAH DASAR NEGERI PIDODO</td>
  </tr>
  <tr>
    <td height="15" align="center" style="font-style: italic; font-size: 14px;">Jl. Mbah Kopek Ds. Pidodo Kec. Karangtengah Kab. Demak 59561</td>
  </tr>
  <tr>
    <td height="19">&nbsp;</td>
  </tr>
</table>
<hr width="1000" style="color:#000000;">
<hr width="1000" style="margin-top:-13.5px; color:#000000;">
<hr width="1000" style="margin-top:-13.3px; color:#000000;">
<hr width="1000" style="margin-top:-13.295px; color:#000000;">
<hr width="1000" style="margin-top:-13.29px; color:#000000;">
<hr width="1000" style="margin-top:-11px; color:#000000;">
<table width="1000" border="0">
  <tr>
    <td width="1000" height="22" align="center"><span style="font-size:18px; font-weight:bold;">DATA PENGEMBALIAN BERDASARKAN TANGGAL PENGEMBALIAN</span></td>
    </tr>
  <tr>
    <td align="Left">&nbsp;</td>
    </tr>
  <tr>
    <td align="Left">Periode : <?php echo date('d-M-Y', strtotime($tglkembaliawal)); ?> s/d <?php echo date('d-M-Y', strtotime($tglkembaliakhir)); ?></td>
    </tr>
</table><br>
<?php

$sql = $conn->query("SELECT
    `peminjaman`.`idpinjam` 
    , `anggota`.`nama` as nama_anggota
    , `jenispeminjam`.`jenispeminjam` as status
    , `buku`.`judul`
    , `buku`.`peng1`
    , `penerbit`.`nama` as penerbit
    , `peminjaman`.`tglpinjam`
    , `peminjaman`.`totalpinjam`
	, `peminjaman`.`tanggungan`
  , `peminjaman_detail`.`jml`
  , `peminjaman_detail`.`tglhrskembali`
	, `peminjaman_detail`.`tgldikembalikan`

FROM
    `simperpus`.`peminjaman`
    LEFT JOIN `simperpus`.`peminjaman_detail` 
        ON (`peminjaman`.`historykey` = `peminjaman_detail`.`historykey`)
    LEFT JOIN `simperpus`.`anggota` 
        ON (`anggota`.`idanggota` = `peminjaman`.`idanggota`)
    LEFT JOIN `simperpus`.`jenispeminjam` 
        ON (`anggota`.`status` = `jenispeminjam`.`idpeminjam`)
    LEFT JOIN `simperpus`.`buku` 
        ON (`buku`.`idbuku` = `peminjaman_detail`.`idbuku`)
    LEFT JOIN `simperpus`.`penerbit` 
        ON (`buku`.`idpenerbit` = `penerbit`.`idpenerbit`) where `peminjaman_detail`.`tgldikembalikan` is not null and `peminjaman_detail`.`tgldikembalikan` between '$tglkembaliawal' and '$tglkembaliakhir' order by `peminjaman`.`idpinjam` ");
?>
<table width="1000" height="102" border="1" cellpadding="0" cellspacing="0">
  <tr bgcolor="#999999">
    <td width="108" height="36" align="center" bgcolor="#CCCCCC">Idpinjam</td>
    <td width="161" align="center" bgcolor="#CCCCCC">Nama Anggota</td>
    <td width="99" align="center" bgcolor="#CCCCCC">Status</td>
    <td width="171" align="center" bgcolor="#CCCCCC">Judul Buku</td>
    <td width="133" align="center" bgcolor="#CCCCCC">Penerbit</td>
    <td width="127" align="center" bgcolor="#CCCCCC">Pengarang</td>
    <td width="115" align="center" bgcolor="#CCCCCC">Tgl Pinjam</td>
    <td width="115" align="center" bgcolor="#CCCCCC">Tgl Hrs Kembali</td>
    <td width="68" align="center" bgcolor="#CCCCCC">Tgl Dikembalikan</td>
    <td width="68" align="center" bgcolor="#CCCCCC">Jumlah</td>
    </tr>
<?php 
$tanggungan = 0;
while($data = mysqli_fetch_array($sql))
{ ?>
  <tr>
    <td height="32" align="center"><?php echo $data['idpinjam'];?></td>
    <td align="center"><?php echo $data['nama_anggota'];?></td>
    <td align="center"><?php echo $data['status'];?></td>
    <td align="center"><?php echo $data['judul'];?></td>
    <td align="center"><?php echo $data['penerbit'];?></td>
    <td align="center"><?php echo $data['peng1'];?></td>
    <td align="center"><?php echo date('d-M-Y', strtotime($data['tglpinjam']));?></td>
    <td align="center"><?php echo date('d-M-Y', strtotime($data['tglhrskembali']));?></td>
    <td align="center"><?php echo date('d-M-Y', strtotime($data['tgldikembalikan']));?></td>
    <td align="center"><?php echo $data['jml'];?></td>
    <?php $tanggungan += $data['jml']; ?>
  </tr>
    <?php
}
  ?>
  <tr>
    <td height="32" colspan="9" align="right">Total Pengembalian</td>
    <td align="center"><?php echo $tanggungan;?></td>
  </tr>


</table><br>
<table width="1000" border="0">
  <tr>
    <td align="Right">Dicetak tgl : <?php echo date('d-M-Y');?></td>
  </tr>
</table>
</div>
</body>
</html>
<?php
//penulisan output selesai, sekarang menutup mpdf dan generate kedalam format pdf
 
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>