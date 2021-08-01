<?php
    require_once "../functions.php";
    check_login();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Daftar Bengkel</title>
        <?php include "../contents/headscript.php";?>
    </head>
<body>
    <?php include "../contents/navbar.php";?>
    <main>
        <div class="container">
          <div class="col-sm-12">
              <a href="bengkel_add.php" class = "btn btn-primary mb-2">Tambah Bengkel</a>
          </div>  
        <div class="col-sm-12">
            <table class= "table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID Bengkel</th>
                        <th scope="col">Nama Bengkel</th>
                        <th scope="col">Kode Bengkel</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No. Telepon</th>
                        <th scope="col">Jam Buka</th>
                        <th scope="col">Jam Tutup</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once "../koneksi.php";
                    $conn = open_connection();

                    $query = "SELECT bengkelid, namabengkel,  kodebengkel, alamat, notelp, jambuka, jamtutup from bengkel  ";
                    $hasil = mysqli_query($conn, $query);
                    $i = 1;
                    while($row = mysqli_fetch_assoc($hasil)) {
                        echo "<tr>";
                        echo "<td>".$i++. "</td>";
                        echo "<td>$row[bengkelid]</td>";
                        echo "<td>$row[namabengkel]</td>";
                        echo "<td>$row[kodebengkel]</td>";
                        echo "<td>$row[alamat]</td>";
                        echo "<td>$row[notelp]</td>";
                        echo "<td>$row[jambuka]</td>";
                        echo "<td>$row[jamtutup]</td>";
                        echo "<td>
                        <a class = 'btn btn-success' href='bengkel_edit.php?bengkelid=$row[bengkelid]'>Edit</a>
                        </td>";
                        echo "<td>
                        <a class = 'btn btn-danger' href='bengkel_delete.php?bengkelid=$row[bengkelid]'>Delete</a>
                        </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        </div>
    </main>
    <?php include "../contents/footer.php"; ?>
</body>
</html>