<?php

include "pdf/class.ezpdf.php"; //class ezpdf yg di panggil
$pdf = new Cezpdf('a4','landscape');

//Set margin dan font
$pdf->ezSetCmMargins(3, 3, 3, 3);
$pdf->selectFont('pdf/fonts/Courier.afm');

//Tampilkan gambar di dokumen PDF
/*$pdf->addJpegFromFile('sipi.jpg',31,778,90);*/

//Teks di tengah atas untuk judul header
$pdf->addText(250, 550, 16,'<b>LAPORAN BUKU BERDASARKAN TGL INPUT</b>');
$pdf->addText(350, 525, 14,'<b>SD NEGERI PIDODO</b>');

//Garis atas untuk header
$pdf->line(31, 770, 565, 770);

//Garis bawah untuk footer
$pdf->line(30, 50, 810, 50);

//Teks kiri bawah
$pdf->addText(30,20,8,'Dicetak tgl:' . date( 'd-M-Y'));

// Baca input tanggal yang dikirimkan user
 $tglinputawal =date("Y-m-d", strtotime($_GET['tglinputawal']));
 $tglinputakhir =date("Y-m-d", strtotime($_GET['tglinputakhir']));
//echo "$mulai $selesai";exit;

//Menampilkan isi dari database
//Koneksi ke database dan tampilkan datanya
include "../koneksi.php";

$sql = $conn->query("SELECT
 `buku`.*
 ,`asalbuku`.`asal` AS a_asal
 ,`bahasa`.`bahasa` AS b_bahasa
 FROM
 `buku`
 LEFT JOIN `asalbuku` 
 ON (`asalbuku`.`idasal` = `buku`.`idasal`)
 LEFT JOIN `bahasa`
 ON (`bahasa`.`idbahasa` = `buku`.`idbahasa`) 
 WHERE `buku`.`tglinput` BETWEEN '$tglinputawal' And '$tglinputakhir'
 ORDER BY idbuku ASC");
 
//Menghitung jumlah data pada database  
$jml = mysqli_num_rows($sql);
if ($jml >= 1){

$i = 1;
while($r = mysqli_fetch_array($sql)) {
$tglpengadaan = date("d-M-Y", strtotime($r["tanggalbeli"]));
//Format Menampilkan data di ezPdf
    $data[$i]=array('No'=>$i,
                   'TGL PENGADAAN'=>$tglpengadaan,
                   'NO IVENTARIS'=>"$r[accnumber]",
                   'PENGARANG'=>"$r[peng1]",
                   'JUDUL'=>"$r[judul]",
                   'BAHASA'=>"$r[b_bahasa]",
                   'HARGA (Rp)'=>"$r[harga]",
                   'ASAL BUKU'=>"$r[a_asal]",
                   'NO KLASIFIKASI'=>"$r[idklass]"
                   );
    $i++;

}

//Tampilkan Dalam Bentuk Table
$pdf->ezTable($data);
$tglawal = date("d-M-Y", strtotime($tglinputawal));
$tglakhir = date("d-M-Y", strtotime($tglinputakhir));
$pdf->ezText("\nPeriode Dari Tanggal Pengadaan: $tglawal s/d $tglakhir");

// Penomoran halaman
$pdf->ezStartPageNumbers(810, 20, 8);
$pdf->ezStream();
}

else{

    echo "
    <script>
    alert('Tidak Ada Data Buku');
    window.location=\"index.php?dt=cetakbuku\";
    </script>
    ";

}
?>