<div>
  <ul class="breadcrumb">
    <li>
      <a href="#"><span class="glyphicon glyphicon-book"></span> Grafik Buku</a>
    </li>
  </ul>
</div>

<select style="width: 210px;" class="form-control" name="grafikbuku" id="grafikbuku" onchange="buku()" />
  <option value="">Pilih Grafik</option>
  <option value="1">Buku</option>
  <option value="2">Buku Yang Sering Dipinjam</option>
</select>
<br>

<div id="container">
</div>

<script type="text/javascript">

// Set up the chart
var chart1; // globally available
function buku () {
var grafikbuku = $("#grafikbuku").val();
if (grafikbuku == "1") {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Buku di Perpustakaan'
         },
         xAxis: {
            categories: ['Buku']
         },
         yAxis: {
            title: {
               text: 'Jumlah Buku'
            }
         },
              series:             
            [
            <?php 
               //config.php adalah file koneksi database bagian ini dipakai 
               //untuk mengambil data dari mysql
           $sql = "SELECT idbuku, judul FROM buku";
            $query = $conn->query($sql);
            while( $ret = mysqli_fetch_array( $query ) ){
              $idbuku=$ret['idbuku'];                     
              $judul=$ret['judul'];                     
                 $sql_jumlah   = $conn->query("SELECT jumlah FROM buku where idbuku='$idbuku' GROUP BY idbuku;");
                 while( $data = mysqli_fetch_array( $sql_jumlah ) ){
                    $jumlah = $data['jumlah'];                 
                  }             
                  ?>
                 //data yang diambil dari database dimasukan ke variable nama dan data
                 //
                  {
                      name: '<?php echo $judul; ?>',
                      data: [<?php echo $jumlah; ?>]
                  },
                  <?php } ?>
            ]
      });
      }

else {
  chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Buku Yang Sering Di Pinjam'
         },
         xAxis: {
            categories: ['Buku']
         },
         yAxis: {
            title: {
               text: 'Jumlah Pinjam'
            }
         },
              series:             
            [
            <?php 
               //config.php adalah file koneksi database bagian ini dipakai 
               //untuk mengambil data dari mysql
           $sql   = "SELECT idbuku, judul FROM buku";
            $query = $conn->query($sql);
            while( $ret = mysqli_fetch_array( $query ) ){
              $idbuku=$ret['idbuku'];                     
              $judul=$ret['judul'];                     
                 $sql_jumlah   = $conn->query("SELECT SUM(jml) as jml  FROM peminjaman_detail where idbuku='$idbuku' GROUP BY idbuku;");
                 while( $data = mysqli_fetch_array( $sql_jumlah ) ){
                    $jumlah = $data['jml'];                 
                  }             
                  ?>
                 //data yang diambil dari database dimasukan ke variable nama dan data
                 //
                  {
                      name: '<?php echo $judul; ?>',
                      data: [<?php echo $jumlah; ?>]
                  },
                  <?php } ?>
            ]
      });
}
   };
</script>
