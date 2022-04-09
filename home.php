<?php
	$total_masuk = 0;
    $total_keluar=0;
	$sql = $koneksi->query("select * from kas");
	while($data=$sql->fetch_assoc()){
				
		$jml= $data['jumlah'];
		$total_masuk = $total_masuk+$jml;

        $jml_keluar = $data['keluar']; 
        $total_keluar = $total_keluar+$jml_keluar;

        $total=$total_masuk-$total_keluar;
	}

?>
<marquee>SELAMAT DATANG DI SISTEM INFORMASI PENGELOLAAN KAS MODISTE PUTRI</marquee>
<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
         <h2>Halaman Admin</h2>   
            <h5>Pengelolaan Kas Modiste Putri </h5>
        </div>
    </div>              
     <!-- /. ROW  -->
      <hr />
    <div class="row">
    <div class="col-md-4 col-sm-6 col-xs-6">           
<div class="panel panel-back noti-box">
    <span class="icon-box bg-color-green set-icon">
        <i class="bi bi-cash"></i>
    </span>
    <div class="text-box" >   
        <p class="main-text"><?php echo "Rp.".number_format($total_masuk); ?>,-</p>
        <p class="text-muted">TOTAL KAS MASUK</p>
    </div>
 </div>
 </div>
        <div class="col-md-4 col-sm-6 col-xs-6">           
<div class="panel panel-back noti-box">
    <span class="icon-box bg-color-red set-icon">
        <i class="bi bi-cash-coin"></i>
    </span>
    <div class="text-box" >
        <p class="main-text"><?php echo "Rp.".number_format($total_keluar); ?>,-</p>
        <p class="text-muted">TOTAL KAS KELUAR</p>
    </div>
 </div>
 </div>
        <div class="col-md-4 col-sm-6 col-xs-6">           
<div class="panel panel-back noti-box">
    <span class="icon-box bg-color-brown set-icon">
        <i class="bi bi-coin"></i>
    </span>
    <div class="text-box" >
        <p class="main-text"><?php echo "Rp.".number_format($total); ?>,-</p>
        <p class="text-muted">SALDO AKHIR</p>
    </div>
 </div>
 </div>
      
<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="GAMBAR01.png" alt="Los Angeles" width="100%" height="600px">
    </div>
    <div class="carousel-item ">
      <img src="GAMBAR02.png" alt="Los Angeles" width="100%" height="600px">
    </div>
    <div class="carousel-item ">
      <img src="GAMBAR01.png" alt="Los Angeles" width="100%" height="600px">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
