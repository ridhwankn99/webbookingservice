<?php
require_once "../functions.php";
check_login();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Detail Motor</title>
        <?php include "../contents/headscript.php";?>
</head>
<body>
    <?php include "../contents/navbar.php";?>
    <main>
        <div class="container">
          <div class="col-sm-12">
              <a href="motor_add.php" class = "btn btn-primary mb-2">Tambah Detail Motor</a>
          </div>  
        <div class="col-sm-12">
            <table class= "table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Motor ID</th>
                        <th scope="col">Nama Motor</th>
                        <th scope="col">Tipe Motor</th>
                        <th scope="col">Tahun Perakitan</th>
                        <th scope="col">Warna Motor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once "../koneksi.php";
                    $conn = open_connection();

                    $query = "SELECT motorid, motorname, motortype, taper, warmot from motor";
                    $hasil = mysqli_query($conn, $query);
                    $i = 1;
                    while($row = mysqli_fetch_assoc($hasil)) {
                        echo "<tr>";
                        echo "<td>".$i++. "</td>";
                        echo "<td>$row[motorid]</td>";
                        echo "<td>$row[motorname]</td>";
                        echo "<td>$row[motortype]</td>";
                        echo "<td>$row[taper]</td>";
                        echo "<td>$row[warmot]</td>";
                        echo "<td>
                        <a class = 'btn btn-success' href='motor_edit.php?motorid=$row[motorid]'>Edit</a>
                        <a class = 'btn btn-danger' href='motor_delete.php?motorid=$row[motorid]'>Delete</a>
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