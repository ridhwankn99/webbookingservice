<?php
	require_once "functions.php";
	check_login();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Booking Service Motor</title>
	<?php include "contents/headscript.php"; ?>
</head>
<body>
	<?php include "contents/navbar.php"; ?>
	<main>
		<div class="container">
		<div class="jumbotron">
			<!-- <h1 class="display-4">WELCOME TO BOOKING SERVICE MOTOR!</h1>
			<p class="lead">Service Motor Ga Pake antri!! </p> -->
		</div>
		</div>
		

  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <!-- <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
	  	<img src="./assets/brand/slider1.jpg" alt="Los Angeles" style="width:100%;">
	  	<div class="container">
          <div class="carousel-caption text-start">
            <h1 style="color:black;">We're Everywhere</h1>
            <p style="color:black;">Siap Sedia Dimanapun Kapanpun</p>
            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item ">
	  	<img src="./assets/brand/slider2.jpg" alt="Los Angeles" style="width:100%;">
        <div class="container">
          <div class="carousel-caption text-start">
            <h1 style="color:black;">Always There For You.</h1>
            <p style="color:black;">Customer Service kami selalu siap 24 jam.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
          </div>
        </div>
      </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
		  <!-- Marketing messaging and featurettes
  ================================================== -->

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row ">
      <div class="col-lg-4 text-center">
	  	<img class="mb-4" src="./assets/brand/service.png" alt="" width="140" height="140">
        <h2>Service</h2>
        <p>Menyediakan berbagai macam jasa servis untuk kendaraan kesayangan anda.</p>
        <p><a class="btn btn-primary" href="#">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->

      <div class="col-lg-4 text-center">
	  	<img class="mb-4" src="./assets/brand/sparepart.png" alt="" width="200" height="140">
        <h2>Sparepart</h2>
        <p>Bekerjasama dengan perusahaan dalam menyediakan sparepart yang original dengan harga terjangkau.</p>
        <p><a class="btn btn-primary" href="#">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->

      <div class="col-lg-4 text-center">
	  	<img class="mb-4" src="./assets/brand/bengkel.png" alt="" width="150" height="150">
        <h2>Bengkel</h2>
        <p>Terintegrasi dengan banyak bengkel di berbagai daerah di Indonesia.</p>
        <p><a class="btn btn-primary" href="http://localhost/Project%20PWL/bengkel/bengkel.php">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->

  </div><!-- /.container -->
	</main>
	<?php include "contents/footer.php"; ?>
</body>
</html>
	