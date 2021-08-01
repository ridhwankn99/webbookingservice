<?php
require_once "../koneksi.php";
require_once "../functions.php";

check_login();

$partid = $_GET['partid'];
$conn = open_connection();
$query = "DELETE FROM part WHERE partid = '$partid'";

$hasil = mysqli_query($conn, $query);

if ($hasil) {
    $url = BASE_URL . "sparepart/sparepart.php";
    header("Location: $url");
}else {
    echo "Gagal menghapus data $partid: ". mysqli_error($conn);
}
?>