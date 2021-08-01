<?php
require_once "../functions.php";
check_login();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Halaman Daftar Sparepart</title>
        <?php include "../contents/headscript.php";?>
</head>
<body>
    <?php include "../contents/navbar.php";?>
    <main>
        <div class="container">
          <div class="col-sm-12">
              <a href="sparepart_add.php" class = "btn btn-primary mb-2">Tambah Sparepart</a>
          </div>  
        <div class="col-sm-12">
            <table class= "table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID Sparepart</th>
                        <th scope="col">Kode Sparepart</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Grup Sparepart</th>
                        <th scope="col">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once "../koneksi.php";
                    $conn = open_connection();

                    $query = "SELECT a.partid, a.kodepart, a.description, a.gruppart, a.harga from part a ";
                    $hasil = mysqli_query($conn, $query);
                    $i = 1;
                    while($row = mysqli_fetch_assoc($hasil)) {
                        echo "<tr>";
                        echo "<td>".$i++. "</td>";
                        echo "<td>$row[partid]</td>";
                        echo "<td>$row[kodepart]</td>";
                        echo "<td>$row[description]</td>";
                        echo "<td>$row[gruppart]</td>";
                        echo "<td>$row[harga]</td>";
                        echo "<td>
                        <a class = 'btn btn-success' href='sparepart_edit.php?partid=$row[partid]'>Edit</a>
                        <a class = 'btn btn-success' href='sparepart_delete.php?partid=$row[partid]'>Delete</a>
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