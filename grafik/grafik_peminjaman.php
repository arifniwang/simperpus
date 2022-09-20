<div>
  <ul class="breadcrumb">
    <li>
      <a href="#"><span class="glyphicon glyphicon-book"></span> Grafik Peminjaman</a>
    </li>
  </ul>
</div>

<select style="width: 210px;" class="form-control" name="grafikpeminjam" id="grafikpeminjam" onchange="peminjaman()" />
  <option value="1">Peminjaman</option>
</select>
<br>

<div id="container">
</div>

<script type="text/javascript">

// Set up the chart
var chart1; // globally available
function peminjaman () {
var grafikpeminjam = $("#grafikpeminjam").val();
if (grafikpeminjam == "1") {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Grafik Peminjaman Buku'
         },
         xAxis: {
            categories: ['Bulan']
         },
         yAxis: {
            title: {
               text: 'Jumlah Peminjam'
            }
         },
              series:             
            [
            <?php 
               //config.php adalah file koneksi database bagian ini dipakai 
               //untuk mengambil data dari mysql
           $sql = "SELECT MONTH(tglpinjam) as tglpinjam FROM peminjaman";
            $query = $conn->query($sql);
            while( $ret = mysqli_fetch_array( $query ) ){                    
              $status=$ret['tglpinjam'];

                 $sql_jumlah   = $conn->query("SELECT count(idpinjam) FROM peminjaman where tglpinjam='$status' ");
                 while( $data = mysqli_fetch_array( $sql_jumlah ) ){
                    $jumlah = $data['jml'];                 
                  }          
                  ?>
                 //data yang diambil dari database dimasukan ke variable nama dan data
                 //
                  {
                      name: '<?php echo $status; ?>',
                      data: [<?php echo $jumlah; ?>]
                  },
                  <?php } ?>
            ]
      });
      }


   };
</script>