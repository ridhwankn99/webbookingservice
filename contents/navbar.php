<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Booking Servie Motor</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=BASE_URL?>index.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Master
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?=BASE_URL?>customer/customer.php">Customer</a></li>
            <li><a class="dropdown-item" href="<?=BASE_URL?>jasa/jasa.php">Jasa</a></li>
            <li><a class="dropdown-item" href="<?=BASE_URL?>motor/motor.php">Motor</a></li>
            <li><a class="dropdown-item" href="<?=BASE_URL?>sparepart/sparepart.php">Sparepart</a></li>
            <li><a class="dropdown-item" href="<?=BASE_URL?>mekanik/mekanik.php">Mekanik</a></li>
            <li><a class="dropdown-item" href="<?=BASE_URL?>bengkel/bengkel.php">Bengkel</a></li>
          </ul>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Laporan
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?=BASE_URL?>reportcustomer/reportcustomer.php">Laporan Customer</a></li>
            <li><a class="dropdown-item" href="<?=BASE_URL?>reportmotor/reportmotor.php">Laporan Motor</a></li>
          </ul>
        </li>
        <a class="nav-link active" aria-current="page" href="#">Transaksi</a>

        
        <a class="nav-link active" aria-current="page" href="<?=BASE_URL?>logout.php">Logout</a>
    </div>
  </div>
 
</nav>
</header>