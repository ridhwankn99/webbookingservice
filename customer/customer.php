<?php
require_once "../functions.php";
check_login();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Daftar Customer</title>
        <?php include "../contents/headscript.php";?>
</head>
<body>
    <?php include "../contents/navbar.php";?>
    <main>
        <div class="container">
          <div class="col-sm-12">
              <a href="customer_add.php" class = "btn btn-primary mb-2">Tambah Customer</a>
          </div>  
        <div class="col-sm-12">
            <table class= "table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID Customer</th>
                        <th scope="col">Nama</th>
                        <th scope="col">No. Mesin Kendaraan</th>
                        <th scope="col">No. Polisi Kendaraan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once "../koneksi.php";
                    $batas = 10;
							$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
							$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

							$previous = $halaman - 1;
							$next = $halaman + 1;	
                    $conn = open_connection();

                    $query = "SELECT customerid, customername,  nomesin, nopol from customer  ";
                    $hasil = mysqli_query($conn, $query);
                    $jumlah_data = mysqli_num_rows($hasil);
								$total_halaman = ceil($jumlah_data / $batas);

								$data_customer = mysqli_query($conn,"SELECT customerid, customername,  nomesin, nopol from customer limit $halaman_awal, $batas");
								$nomor = $halaman_awal+1;

                   //$i = 1;
                    while($row = mysqli_fetch_assoc($data_customer)) {
                        echo "<tr>";
                        echo "<td>".$nomor++. "</td>";
                        echo "<td>$row[customerid]</td>";
                        echo "<td>$row[customername]</td>";
                        echo "<td>$row[nomesin]</td>";
                        echo "<td>$row[nopol]</td>";
                        echo "<td>
                        <a class = 'btn btn-success' href='customer_edit.php?customerid=$row[customerid]'>Edit</a>
                        <a class = 'btn btn-danger' href='customer_delete.php?customerid=$row[customerid]'>Delete</a>
                        </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <nav>
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
				</li>
				<?php 
				for($x=1;$x<=$total_halaman;$x++){
					?> 
					<li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>				
				<li class="page-item">
					<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
				</li>
			</ul>
		</nav>
        </div>
        </div>
    </main>
    <?php include "../contents/footer.php"; ?>
</body>
</html>