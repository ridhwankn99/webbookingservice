<?php
    require_once "../functions.php";
    check_login();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Daftar Mekanik</title>
        <?php include "../contents/headscript.php";?>
    </head>
<body>
    <?php include "../contents/navbar.php";?>
    <main>
        <div class="container">
          <div class="col-sm-12">
              <a href="mekanik_add.php" class = "btn btn-primary mb-2">Tambah Mekanik</a>
          </div>  
        <div class="col-sm-12">
            <table class= "table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Mekanik ID</th>
                        <th scope="col">Nama Mekanik</th>
                        <th scope="col">Kode Bengkel</th>
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

                    $query = "SELECT a.mekanikid, a.namamekanik, a.kodebengkel FROM mekanik a JOIN bengkel k on a.kodebengkel = k.kodebengkel";
                    $hasil =  mysqli_query($conn, $query);
							  $jumlah_data = mysqli_num_rows($hasil);
								$total_halaman = ceil($jumlah_data / $batas);

								$data_mekanik = mysqli_query($conn,"SELECT a.mekanikid, a.namamekanik, a.kodebengkel FROM mekanik a JOIN bengkel k on a.kodebengkel = k.kodebengkel limit $halaman_awal, $batas");
								$nomor = $halaman_awal+1;

                    $hasil = mysqli_query($conn, $query);
                    $i = 1;
                    while($row = mysqli_fetch_assoc($hasil)) {
                        echo "<tr>";
                        echo "<td>".$i++. "</td>";
                        echo "<td>$row[mekanikid]</td>";
                        echo "<td>$row[namamekanik]</td>";
                        echo "<td>$row[kodebengkel]</td>";
                        echo "<td>
                        <a class = 'btn btn-success' href='mekanik_edit.php?mekanikid=$row[mekanikid]'>Edit</a>
                        <a class = 'btn btn-danger' href='mekanik_delete.php?mekanikid=$row[mekanikid]'>Delete</a>
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