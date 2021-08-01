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
			<h1>Report Customer</h1>
        <div class="col-sm-12">
		
        </div>
		
			<form class = "form-horizontal" action="createpdf.php" method="POST">
				
                <div class="form-group mb-3">
				
					<label for="">Pilihan Bengkel</label>
					<select name="bengkelname" class="form-control">
						<?php
						
							require_once "../koneksi.php";
							$conn = open_connection();
							

							$query = "SELECT namabengkel, bengkelid from bengkel  ";
							$hasil = mysqli_query($conn, $query);
							$i = 1;
							while($row = mysqli_fetch_assoc($hasil)) {
								
								echo "<tr>";
								echo "<td>".$i++. "</td>";
								echo "<option>$row[namabengkel]</option>";
								echo "</tr>";
								
							}
							
						?>
					</select>
                    
                </div>
                <div class="form-group mb-3">
                    <label for="">Tanggal Booking</label>
                    <input type="date" name="datebooking" class="form-control" />
                </div>
                <div class="form-group mb-3">
					<button type="submit" name="search" class="btn btn-primary" formaction = "reportcustomer.php" >Search</button>
					<button type="submit" name="print" class="btn btn-primary" formaction = "createpdf.php" >Create PDF</button>
					<!-- <a name="print" class = 'btn btn-primary mb-2' href='createpdf.php'> Create PDF </a> -->
					
                </div>

				
				
				<div class="row">
					<table class= "table table-striped">
						<thead>
							<tr>
								<th scope="col">ID Customer</th>
								<th scope="col">Tanggal</th>
								<th scope="col">Nama</th>
								<th scope="col">Jenis Kelamin</th>
								<th scope="col">No Telepon </th>
								<th scope="col">Email</th>
								<th scope="col">Alamat</th>
								<th scope="col">No Mesin</th>
								<th scope="col">No Polisi</th>
							</tr>
						</thead>
					
						<tbody>
							<?php
								require_once "../koneksi.php";	
								require_once "../vendor/autoload.php";
								
								$conn = open_connection();
								
								if(isset($_POST['search'])){
									$namebengkel = $_POST['bengkelname'];
									$datebooking = $_POST['datebooking'];
									if($namebengkel != "" || $datebooking != ""){
										$querybengkelid = "SELECT bengkelid FROM bengkel WHERE namabengkel = '$namebengkel'";
										$id = mysqli_query($conn, $querybengkelid);
										
										while($row = mysqli_fetch_assoc($id)){
											$idd = $row['bengkelid'];
											
										}
										
										$query = "SELECT * FROM bengkel, booking, customer WHERE bengkel.bengkelid = '$idd' AND booking.bengkelid = '$idd' AND customer.customerid=booking.customerid AND booking.tanggalbooking='$datebooking'";
										$data = mysqli_query($conn, $query);
										
										if(mysqli_num_rows($data) > 0){
											while($row = mysqli_fetch_assoc($data)){
												
												echo "<tr>";
												echo "<td>$row[customerid]</td>";
												echo "<td>$row[tanggalbooking]</td>";
												echo "<td>$row[customername]</td>";
												echo "<td>$row[jeniskelamin]</td>";
												echo "<td>$row[notelp]</td>";
												echo "<td>$row[email]</td>";
												echo "<td>$row[alamat]</td>";
												echo "<td>$row[nomesin]</td>";
												echo "<td>$row[nopol]</td>";
												echo "</tr>";
											}
										} else {
											?>
											<tr>
												<td>not found</td>
											</tr>
											<?php
										}
									}
								} 
							?>
						</tbody>
					</table>
				</div>
            </form>
        </div>
    </main>
    <?php include "../contents/footer.php"; ?>
</body>
</html>