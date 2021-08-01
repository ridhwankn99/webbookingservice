<?php
require_once "../functions.php";
check_login();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Daftar Jasa</title>
        <?php include "../contents/headscript.php";?>
</head>
<body>
    <?php include "../contents/navbar.php";?>
    <main>
        <div class="container">
          <div class="col-sm-12">
              <a href="jasa_add.php" class = "btn btn-primary mb-2">Tambah Jasa</a>
          </div>  
        <div class="col-sm-12">
            <table class= "table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Jasa ID</th>
                        <th scope="col">Nama Jasa</th>
                        <th scope="col">Tipe Jasa</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Estimasi Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once "../koneksi.php";
                    $conn = open_connection();

                    $query = "SELECT jasaid, namajasa,  tipejasa, harga, estimasiwaktu from jasa  ";
                    $hasil = mysqli_query($conn, $query);
                    $i = 1;
                    while($row = mysqli_fetch_assoc($hasil)) {
                        echo "<tr>";
                        echo "<td>".$i++. "</td>";
                        echo "<td>$row[jasaid]</td>";
                        echo "<td>$row[namajasa]</td>";
                        echo "<td>$row[tipejasa]</td>";
                        echo "<td>$row[harga]</td>";
                        echo "<td>$row[estimasiwaktu]</td>";
                        echo "<td>
                        <a class = 'btn btn-success' href='jasa_edit.php?jasaid=$row[jasaid]'>Edit</a>
                        <a class = 'btn btn-danger' href='jasa_delete.php?jasaid=$row[jasaid]'>Delete</a>
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