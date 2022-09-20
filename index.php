<?php
include "koneksi.php";
session_start();
$dt = isset($_GET['dt']) ? $_GET['dt'] : null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Perpustakaan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/nav.css">

  <link rel="stylesheet" href="css/custom.css">

  <link rel="stylesheet" href="css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/moment.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/script.js"></script>
  <script src="js/bootstrap-datetimepicker.min.js"></script>
  <script src="js/highcharts.js"></script>
  <script src="js/exporting.js"></script>

  <link rel="stylesheet" href="css/fwslider.css" media="all">
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/css3-mediaqueries.js"></script>
  <script src="js/fwslider.js"></script>
</head>

<body>

  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Perpustakaan</a>
      </div>
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav">
          <!-- <li  <?php if ($dt == "") echo "class='active'"; ?>><a href="index.php"><span class="glyphicon glyphicon-home">Home</a></li> -->
          <li <?php if (
                $dt == "anggota" || $dt == "peminjam" || $dt == "buku" || $dt == "penerbit" || $dt == "klasifikasi" || $dt == "jenisbuku" || $dt == "asal" || $dt == "suratkabar" ||
                $dt == "koran"
              ) echo "class='active'"; ?>>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">Registrasi
              <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="?dt=anggota">Anggota</a></li>
              <li><a href="?dt=peminjam">Jenis Peminjam</a></li>
              <!-- <li><a href="index.php?dt=kelas">Kelas</a></li> -->
              <li><a href="?dt=buku">Buku</a></li>
              <li><a href="?dt=penerbit">Penerbit</a></li>
              <li><a href="?dt=klasifikasi">Klasifikasi Buku</a></li>
              <li><a href="?dt=jenis">Jenis Buku</a></li>
              <li><a href="?dt=asal">Asal Buku</a></li>
              <!-- <li><a href="?dt=suratkabar">Data Induk Majalah / Surat Kabar</a></li>
              <li><a href="?dt=koran">Data Serial Majalah / Surat Kabar</a></li> -->
            </ul>
          </li>
          <li <?php if ($dt == "peminjaman" || $dt == "history") echo "class='active'"; ?>>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">Sirkulasi
              <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="?dt=peminjaman">Peminjaman Buku</a></li>
              <li><a href="?dt=history">History Peminjaman Buku</a></li>
              <!-- <li><a href="index.php?dt=perpanjangan">Perpanjangan Buku</a></li>
                <li><a href="index.php?dt=pinjammajalah">Peminjaman Majalah</a></li>
                <li><a href="index.php?dt=kembalimajalah">Pengembalian Majalah</a></li>
                <li><a href="index.php?dt=panjangmajalah">Perpanjangan Majalah</a></li> -->
            </ul>
          </li>
          <li <?php if ($dt == "cetakbuku" || $dt == "cetakanggota" || $dt == "cetakpeminjaman" || $dt == "cetakpengembalian" || $dt == "cetakdenda") echo "class='active'"; ?>>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">Cetak
              <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="?dt=cetakbuku">Buku</a></li>
              <li><a href="?dt=cetakanggota">Anggota</a></li>
              <li><a href="?dt=cetakpeminjaman">Peminjaman</a></li>
              <li><a href="?dt=cetakpengembalian">Pengembalian</a></li>
              <li><a href="?dt=cetakdenda">Denda</a></li>
            </ul>
          </li>
          <li <?php if ($dt == "grafik_buku_sering_dipinjam") echo "class='active'"; ?>>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">Statistik
              <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="?dt=grafik_anggota">Anggota</a></li>
              <li><a href="?dt=grafik_buku">Buku</a></li>
              <!-- <li><a href="?dt=grafik_peminjaman">Peminjaman</a></li> -->
            </ul>
          </li>
          <li <?php if ($dt == "profil" || $dt == "operator") echo "class='active'"; ?>>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">Setting
              <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="?dt=password">Password</a></li>
              <?php if ($_SESSION['level'] == 'admin') : ?>
                <li><a href="?dt=operator">Operator</a></li>
              <?php endif ?>
            </ul>
          </li>
          <!--  <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">Pencarian
                  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="index.php?dt=caribuku">Cari Buku</a></li>
                    <li><a href="index.php?dt=carianggota">Cari Anggota</a></li>
                  </ul>
                </li> -->
        </ul>


        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome, <?php echo $_SESSION['username']; ?></a></li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
          <li><a class="btn" onclick="pencarian()"><span class="glyphicon glyphicon-search"></span> Pencarian </a></li>
          <li><a class="btn" onclick="login()"><span class="glyphicon glyphicon-log-in"></span> Login </a></li>

        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <?php
    switch ($dt) {
      case "login":
        require_once("login.php");
        break;

      case "anggota":
        require_once("registrasi/anggota_data.php");
        break;
      case "peminjam":
        require_once("registrasi/peminjam_data.php");
        break;
      case "buku":
        require_once("registrasi/buku_data.php");
        break;
      case "penerbit":
        require_once("registrasi/penerbit_data.php");
        break;
      case "kelas":
        require_once("registrasi/kelas_data.php");
        break;
      case "klasifikasi":
        require_once("registrasi/klasifikasi_data.php");
        break;
      case "jenis":
        require_once("registrasi/jenis_data.php");
        break;
      case "asal":
        require_once("registrasi/asal_data.php");
        break;
      case "suratkabar":
        require_once("registrasi/suratkabar_data.php");
        break;
      case "koran":
        require_once("registrasi/koran_data.php");
        break;

      case "grafik_anggota":
        require_once("grafik/grafik_anggota.php");
        break;
      case "grafik_buku":
        require_once("grafik/grafik_buku.php");
        break;
      case "grafik_peminjaman":
        require_once("grafik/grafik_peminjaman.php");
        break;

      case "password":
        require_once("setting/password_data.php");
        break;
      case "prosespassword":
        require_once("setting/prosespassword.php");
        break;
      case "operator":
        require_once("setting/operator_data.php");
        break;

      case "peminjaman":
        require_once("sirkulasi/peminjaman_data.php");
        break;
      case "history":
        require_once("sirkulasi/history_peminjaman.php");
        break;
        /* case "perpanjangan" : require_once ("sirkulasi/perpanjangan_data.php"); break;
            case "pinjammajalah"   : require_once ("sirkulasi/peminjaman_data.php"); break;            
            case "kembalimajalah" : require_once ("sirkulasi/pengembalian_data.php"); break;*/


      case "cetakbuku":
        require_once("cetak/cetak_buku_data.php");
        break;
      case "cetakanggota":
        require_once("cetak/cetak_anggota_data.php");
        break;
      case "cetakpeminjaman":
        require_once("cetak/cetak_peminjaman_data.php");
        break;
      case "cetakpengembalian":
        require_once("cetak/cetak_pengembalian_data.php");
        break;
      case "cetakdenda":
        require_once("cetak/cetak_denda_data.php");
        break;

      default:
        require_once("home.php");
        break;
    }
    ?>
  </div>

  <footer class="footer">
    <div class="container">
      <center>
        <p style="color:black;"><b>Copyright &copy;2017 Universitas Dian Nuswantoro</b></p>
      </center>
    </div>
  </footer>

  <div id="modal_login" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Masukkan Username dan Password</h4>
        </div>
        <div class="modal-body" align="center">
          <div class="input-group input-group-lg" align="center"><img src="images/login.png" class="img-circle" width="250" height="220"></div>
          <br>
          <form class="form-horizontal">
            <fieldset>
              <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user" style="color:grey;"></i></span>
                <input type="text" class="form-control" placeholder="Username" id="username" name="username" required />
              </div>
              <div class="clearfix"></div><br>

              <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock" style="color:grey;"></i></span>
                <input type="password" class="form-control" placeholder="Password" id="password" name="password" required />
              </div>
              <div class="clearfix"></div>
              </br>
            </fieldset>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-info" type="button" name="hapus" onclick="masuk()">
            <i class="glyphicon glyphicon-log-in"></i>&nbsp; Login
          </button>
          <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
            <i class="glyphicon glyphicon-remove"></i>&nbsp; Batal
          </button>
        </div>
      </div>
    </div>
  </div>

  <div id="modal_search" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Cari Buku </h4>
        </div>
        <div class="modal-body" align="center">

          <table class="form-horizontal">
            <tr>
              <td class="form-grup">
                <input type="text" class="form-control" placeholder="Judul Buku" id="judul" name="judul">
              </td>
              <td class="form-group">&nbsp;</td>
              <td class="form-group">
                <select class="form-control" name="idpenerbit" id="idpenerbit">
                  <option value="%">Semua Penerbit</option>
                  <?php
                  $sql = "SELECT * from penerbit";
                  $qry = $conn->query($sql);
                  while ($data = mysqli_fetch_object($qry)) {
                    echo "<option value='" . $data->idpenerbit . "'>" . $data->nama . "</option>";
                  }
                  ?>
                </select>
              </td>
              <td class="form-group">&nbsp;</td>
              <td class="form-group">
                <select class="form-control" name="idpeng" id="idpeng">
                  <option value="%">Semua Pengarang</option>
                  <?php
                  $sql = "SELECT * from buku";
                  $qry = $conn->query($sql);
                  while ($data = mysqli_fetch_object($qry)) {
                    echo "<option value='" . $data->idpeng . "'>" . $data->peng1 . "</option>";
                  }
                  ?>
                </select>
              </td>
              <td class="form-group">&nbsp;</td>
              <td>
                <button class="btn btn-info" type="button" id="cari" onclick="cari()">
                  <i class="glyphicon glyphicon-search"></i>&nbsp; Cari
                </button>
              </td>
            </tr>
          </table>
          <br>

          <table class="table table-striped table-bordered responsive">
            <thead>
              <tr align="center">
                <!-- <th> No </th> -->
                <th> Id Buku </th>
                <th> Judul Buku </th>
                <th> Pengarang </th>
                <th> Penerbit </th>
                <th> Letak Buku </th>
                <th> Jumlah Buku </th>
                <th> Ket. </th>
              </tr>
            </thead>
            <tbody id="tbody_pencarian"></tbody>
          </table>

          <div class="modal-footer">
            <!-- <button class="btn btn-info" type="button" name="hapus" onclick="masuk()">
          <i class="glyphicon glyphicon-log-in"></i>&nbsp; Login
        </button> -->
            <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
              <i class="glyphicon glyphicon-remove"></i>&nbsp; Batal
            </button>
          </div>
        </div>
      </div>
    </div>

</body>

</html>
<script type="text/javascript">
  $(document).ready(function() {
    $('#myTable').dataTable();
  });
</script>
<script type="text/javascript">
  function login() {
    $('#modal_login').modal('show');
  }

  function masuk() {
    $.ajax({
      url: "proseslogin.php",
      type: "POST",
      data: {
        username: $("#username").val(),
        password: $("#password").val(),
        level: $("#level").val()
      },
      success: function(res) {
        setTimeout(function() {
          $("#modal_login").modal("hide");
        }, 1000);
        window.location.reload();
      }
    });
  }

  function pencarian() {
    $('#modal_search').modal('show');
  }

  function cari() {
    $.ajax({
      url: 'caribuku.php',
      type: 'POST',
      data: {
        judul: $('#judul').val(),
        idpenerbit: $('#idpenerbit').val(),
        idpeng: $('#idpeng').val(),
      },
      success: function(respon) {
        $('#tbody_pencarian').html(respon);
      }

    })
  }
</script>