<?php
  if(!isset($_SESSION['username']))
{
    echo "<script> alert ('Anda Harus Login Terlebih Dahulu') </script>";
    echo "<script> window.location.href = \"?dt=login\" </script>";
}
?>

<div>
  <ul class="breadcrumb">
    <li>
      <a href="#"><span class="glyphicon glyphicon-user"></span> Password</a>
    </li>
  </ul>
</div>

<div class="panel panel-primary">

  <div class="panel-heading">Password</div>

  <div class="panel-body">
    <form id="formID" class="form-horizontal" method="POST" action="?dt=prosespassword">
          <?php
            $sql = $conn->query("SELECT * FROM user where id = '".$_SESSION['id']."'");
            $data = mysqli_fetch_array($sql);
          ?>
          <div class="form-group">
            <label class="col-lg-2 control-label">Password Lama</label>
            <div class="col-lg-5">
            <input style="width: 300px;" class="form-control" type="password" name="passlama" id="passlama" required/>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 control-label">Password Baru</label>
            <div class="col-lg-5">
              <input style="width: 300px;" class="form-control" type="password" name="passbaru" id="passbaru" required/>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 control-label">Konfirmasi Password Baru</label>
            <div class="col-lg-5">
              <input style="width: 300px;" class="form-control" type="password" name="konfirmasipass" id="konfirmasipass" required/>
            </div>
          </div>
          <div class="form-group">
          <label class="col-lg-3 control-label"></label>
            <button class="btn btn-success" type="submit" >Simpan</button>
          </div>
        </form>
</div>
