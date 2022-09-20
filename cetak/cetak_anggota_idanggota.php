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
$idanggotaawal = $_GET['idanggotaawal'];
$idanggotaakhir = $_GET['idanggotaakhir'];
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
    <td width="1000" height="22" align="center"><span style="font-size:18px; font-weight:bold;">DATA ANGGOTA BERDASARKAN ID</span></td>
    </tr>
  <tr>
    <td align="Left">&nbsp;</td>
    </tr>
  <tr>
    <td align="Left">Periode : <?php echo $idanggotaawal; ?> s/d <?php echo $idanggotaakhir; ?></td>
    </tr>
</table><br>
<?php

$sql = $conn->query("SELECT * from anggota where idanggota between '$idanggotaawal' AND
'$idanggotaakhir' ORDER BY idanggota ASC");
?>
<table width="1000" height="70" border="1" cellpadding="0" cellspacing="0">
  <tr bgcolor="#999999">
    <td width="77" height="36" align="center" bgcolor="#CCCCCC">Idanggota</td>
    <td width="210" align="center" bgcolor="#CCCCCC">Nama</td>
    <td width="202" align="center" bgcolor="#CCCCCC">Alamat</td>
    <td width="130" align="center" bgcolor="#CCCCCC">Jenis Kelamin</td>
    <td width="133" align="center" bgcolor="#CCCCCC">Tgl Lahir</td>
    <td width="124" align="center" bgcolor="#CCCCCC">Telp</td>
    <td width="108" align="center" bgcolor="#CCCCCC">Foto</td>
  </tr>
<?php while($data = mysqli_fetch_array($sql)) { ?>
  <tr>
    <td height="32" align="center"><?php echo $data['idanggota'];?></td>
    <td align="center"><?php echo $data['nama'];?></td>
    <td align="center"><?php echo $data['alamat'];?></td>
    <td align="center"><?php echo $data['jeniskel'];?></td>
    <td align="center"><?php echo $data['tgllahir'];?></td>
    <td align="center"><?php echo $data['telp'];?></td>
    <td align="center"><img src="../images/<?php echo $data['foto'];?>" width="100px"/></td>
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