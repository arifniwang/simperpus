    <div class="col-md-5" style="margin-top:20px;">
      <div class="alert alert-info" align="center">
        <h4>Silahkan Masukan Username dan Password Anda.</h4>
      </div>
      <form class="form-horizontal" action="proseslogin.php" method="post">
        <fieldset>
          <div class="input-group input-group-lg">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user" style="color:grey;"></i></span>
            <input type="text" class="form-control" placeholder="Username" id="username" name="username" required/>
          </div>
          <div class="clearfix"></div><br>

          <div class="input-group input-group-lg">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock" style="color:grey;"></i></span>
            <input type="password" class="form-control" placeholder="Password" id="password" name="password" required/>
          </div>
          <div class="clearfix"></div>
           
        </br>

        <div class="input-group input-group-lg col-md-5">
          <button type="submit" class="btn btn-primary" id="simpan" name="simpan"><span class="glyphicon glyphicon-log-in"></span> Login</button>
        </div>
      </fieldset>
    </form>
    </div>