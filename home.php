<div>
<!-- home setelah login -->
  
   <ul class="breadcrumb">
    <li>
     <a href="#"><span class="glyphicon glyphicon-home"></span> Home</a>
   </li>
 </ul>
<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">

<button type="button" class="btn btn-primary btn-lg" style="width:250px;"><i class="glyphicon glyphicon-book blue"></i>
	<div> Buku</div>
	<?php
	$sql="SELECT SUM(jumlah) as idbuku from buku";
	$qry=$conn->query($sql);
	$data=mysqli_fetch_array($qry);
	?>
	<div><?php echo $data['idbuku'];?></div>
</button>
&nbsp;&nbsp;&nbsp;&nbsp;
<button type="button" class="btn btn-primary btn-lg" style="width:250px;"><i class="glyphicon glyphicon-user blue"></i>
	<div> Anggota</div>
	<?php
	$sql="SELECT count(idanggota) as idanggota from anggota";
	$qry=$conn->query($sql);
	$data=mysqli_fetch_array($qry);
	?>
	<div><?php echo $data['idanggota'];?></div>
</button>
 
</div>
</div>

<!-- home sebelum login -->
