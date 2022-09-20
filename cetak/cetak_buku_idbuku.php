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
$idbukuawal = $_GET['idbukuawal'];
$idbukuakhir = $_GET['idbukuakhir'];
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
    <td width="1000" height="22" align="center"><span style="font-size:18px; font-weight:bold;">DATA BUKU BERDASARKAN ID</span></td>
    </tr>
  <tr>
    <td align="Left">&nbsp;</td>
    </tr>
  <tr>
    <td align="Left">Periode : <?php echo $idbukuawal; ?> s/d <?php echo $idbukuakhir; ?></td>
    </tr>
</table><br>
<?php

$sql = $conn->query("SELECT
    `buku`.`idbuku` AS idbuku
    , `buku`.`judul` AS judul
    , `penerbit`.`nama` AS penerbit
    , `buku`.`peng1` AS pengarang
    , `asalbuku`.`asal` AS asalbuku
    , `buku`.`pengadaan` AS tgl_pengadaan
    , `klasifikasi`.`klasifikasi` AS klasifikasi
    , `buku`.`accnumber` AS accnumber
    , `buku`.`ket` AS ket
    , `kondisi`.`kondisi` AS kondisi
    , `buku`.`jumlah` AS jumlah
FROM
    `simperpus`.`penerbit`
    INNER JOIN `simperpus`.`buku` 
        ON (`penerbit`.`idpenerbit` = `buku`.`idpenerbit`)
    INNER JOIN `simperpus`.`asalbuku` 
        ON (`asalbuku`.`idasal` = `buku`.`idasal`)
    INNER JOIN `simperpus`.`klasifikasi` 
        ON (`buku`.`idklass` = `klasifikasi`.`idklasifikasi`)
    INNER JOIN `simperpus`.`kondisi` 
        ON (`kondisi`.`idkondisi` = `buku`.`kondisi`) where `buku`.`idbuku` between '$idbukuawal' AND
'$idbukuakhir' ORDER BY `buku`.`idbuku` ASC");
?>
<table width="1000" height="70" border="1" cellpadding="0" cellspacing="0">
  <tr bgcolor="#999999">
    <td width="89" height="36" align="center" bgcolor="#CCCCCC">Idbuku</td>
    <td width="169" align="center" bgcolor="#CCCCCC">Judul</td>
    <td width="155" align="center" bgcolor="#CCCCCC">Penerbit</td>
    <td width="144" align="center" bgcolor="#CCCCCC">Pengarang</td>
    <td width="120" align="center" bgcolor="#CCCCCC">Accnumber</td>
    <td width="112" align="center" bgcolor="#CCCCCC">Kondisi</td>
    <td width="98" align="center" bgcolor="#CCCCCC">Ket</td>
    <td width="95" align="center" bgcolor="#CCCCCC">Jumlah Buku</td>
  </tr>
<?php while($data = mysqli_fetch_array($sql)) { ?>
  <tr>
    <td height="32" align="center"><?php echo $data['idbuku'];?></td>
    <td align="center"><?php echo $data['judul'];?></td>
    <td align="center"><?php echo $data['penerbit'];?></td>
    <td align="center"><?php echo $data['pengarang'];?></td>
    <td align="center"><?php echo $data['accnumber'];?></td>
    <td align="center"><?php echo $data['kondisi'];?></td>
    <td align="center"><?php echo $data['ket'];?></td>
    <td align="center"><?php echo $data['jumlah'];?></td>
  </tr>
  <?php
}
  ?>
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