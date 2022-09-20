<div>
  <ul class="breadcrumb">
    <li>
      <a href="#"><span class="glyphicon glyphicon-book"></span> Grafik Anggota</a>
    </li>
  </ul>
</div>

<select style="width: 210px;" class="form-control" name="grafikanggota" id="grafikanggota" onchange="anggota()" />
  <option value="">Pilih Grafik</option>
  <option value="1">Anggota</option>
  <!-- <option value="2">Anggota Yang Sering Meminjam</option> -->
</select>
<br>

<div id="container">
</div>

<script type="text/javascript">

// Set up the chart
var chart1; // globally available
function anggota () {
var grafikanggota = $("#grafikanggota").val();
if (grafikanggota == "1") {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Anggota di Perpustakaan'
         },
         xAxis: {
            categories: ['Anggota']
         },
         yAxis: {
            title: {
               text: 'Jumlah Anggota'
            }
         },
              series:             
            [
            <?php 
               //config.php adalah file koneksi database bagian ini dipakai 
               //untuk mengambil data dari mysql
           $sql = "SELECT idanggota, status FROM anggota GROUP BY status";
            $query = $conn->query($sql);
            while( $ret = mysqli_fetch_array( $query ) ){
              $idanggota=$ret['idanggota'];                     
              $status=$ret['status'];

              $sql_status = "SELECT jenispeminjam FROM jenispeminjam where idpeminjam = '$status'";
              $query_status = $conn->query($sql_status);
              while( $status1 = mysqli_fetch_array( $query_status ) ){
                $jenispeminjam = $status1['jenispeminjam'];

                 $sql_jumlah   = $conn->query("SELECT COUNT(idanggota) as jumlah FROM anggota where status='$status' GROUP BY status");
                 while( $data = mysqli_fetch_array( $sql_jumlah ) ){
                    $jumlah = $data['jumlah'];                 
                  }          
                  ?>
                 //data yang diambil dari database dimasukan ke variable nama dan data
                 //
                  {
                      name: '<?php echo $jenispeminjam; ?>',
                      data: [<?php echo $jumlah; ?>]
                  },
                  <?php } }?>
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
            text: 'Anggota Yang Sering Meminjam'
         },
         xAxis: {
            categories: ['Anggota']
         },
         yAxis: {
            title: {
               text: 'Jumlah Anggota'
            }
         },
              series:             
            [
            <?php 
               //config.php adalah file koneksi database bagian ini dipakai 
               //untuk mengambil data dari mysql
           $sql = "SELECT idanggota, status FROM anggota GROUP BY status";
            $query = $conn->query($sql);
            while( $ret = mysqli_fetch_array( $query ) ){
              $idanggota=$ret['idanggota'];                     
              $status=$ret['status'];

              $sql_status = "SELECT jenispeminjam FROM jenispeminjam where idpeminjam = '$status'";
              $query_status = $conn->query($sql_status);
              while( $status1 = mysqli_fetch_array( $query_status ) ){
                $jenispeminjam = $status1['jenispeminjam'];
                   
                 $sql_jumlah   = $conn->query("SELECT SUM(idanggota) as jumlah  FROM anggota where idanggota='$idanggota' GROUP BY idanggota;");
                 while( $data = mysqli_fetch_array( $sql_jumlah ) ){
                    $jumlah = $data['jumlah'];                 
                  }             
                  ?>
                 //data yang diambil dari database dimasukan ke variable nama dan data
                 //
                  {
                      name: '<?php echo $jenispeminjam; ?>',
                      data: [<?php echo $jumlah; ?>]
                  },
                  <?php }} ?>
            ]
      });
}
   };
</script>
