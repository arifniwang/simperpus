<?php 
  // membuat query max untuk kode
  include "../koneksi.php";
  $cari_kd=$conn->query("select max(idkelas) as id from kelas"); //mencari kode yang paling besar atau kode yang baru masuk
  $tm_cari=mysqli_fetch_array($cari_kd);
  $kode=$tm_cari['id']; //mengambil string mulai dari karakter pertama 'A' dan mengambil 4 karakter setelahnya. 
  echo $tambah=$kode+1; //kode yang sudah di pecah di tambah 1
?>