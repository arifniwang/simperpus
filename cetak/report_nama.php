<?php
//memulai menggunakan mpdf
// Tentukan path yang tepat ke mPDF
$nama_dokumen='Laporan Buku Berdasarkan ID Buku'; //Beri nama file PDF hasil.
define('_MPDF_PATH','../mpdf/'); // Tentukan folder dimana anda menyimpan folder mpdf
include(_MPDF_PATH . "mpdf.php"); // Arahkan ke file mpdf.php didalam folder mpdf
$mpdf=new mPDF('utf-8', 'A4-P', 12, 'times'); // Membuat file mpdf baru
//Memulai proses untuk menyimpan variabel php dan html
ob_start();
 
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<head>
<title></title>  
</head>  
<body> 
<div align="center">
<table width="780" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="75" rowspan="4" align="center"><img src="../images/logo-demak-4.png" alt="" width="56" height="75"></td>
    <td width="705" height="19">&nbsp;</td>
  </tr>
  <tr>
    <td height="0" align="center" style="font-size: 24px; font-weight: bold;">SEKOLAH DASAR NEGERI PIDODO</td>
  </tr>
  <tr>
    <td height="15" align="center" style="font-style: italic; font-size: 12px;">Jl. Mbah Kopek Ds. Pidodo Kec. Karangtengah Kab. Demak 59561</td>
  </tr>
  <tr>
    <td height="19">&nbsp;</td>
  </tr>
</table>
<hr width="765" style="color:#000000;">
<hr width="765" style="margin-top:-13.5px; color:#000000;">
<hr width="765" style="margin-top:-13.3px; color:#000000;">
<hr width="765" style="margin-top:-13.295px; color:#000000;">
<hr width="765" style="margin-top:-13.29px; color:#000000;">
<hr width="765" style="margin-top:-12px; color:#000000;">
<table width="780" border="0">
  <tr>
    <td height="22" align="center"><span style="font-size:18px; font-weight:bold;">DATA BUKU BERDASARKAN ID</span></td>
    </tr>
  <tr>
    <td align="Left">&nbsp;</td>
    </tr>
  <tr>
    <td align="Left">Periode : s/d</td>
    </tr>
</table><br>
<table width="780" height="70" border="1" cellpadding="0" cellspacing="0">
  <tr bgcolor="#999999">
    <td height="36" align="center" bgcolor="#CCCCCC">hjdhjshjajshdaj</td>
    <td align="center" bgcolor="#CCCCCC">jahsjdhajs</td>
    <td align="center" bgcolor="#CCCCCC">hjasjda</td>
    <td align="center" bgcolor="#CCCCCC">hd</td>
    <td align="center" bgcolor="#CCCCCC">asjdhajshdj</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table><br>
<table width="780" border="0">
  <tr>
    <td align="Right">Dicetak tgl : <?php .date( 'd-M-Y');?></td>
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