<?php
require_once "../koneksi.php";
require_once "../functions.php";

check_login();

$motorid = $_GET['motorid'];
$conn = open_connection();
$query = "DELETE FROM motor WHERE motorid = '$motorid'";

$hasil = mysqli_query($conn, $query);

if ($hasil) {
    $url = BASE_URL . "motor/motor.php";
    header("Location: $url");
}else {
    echo "Gagal menghapus data $motorid: ". mysqli_error($conn);
}
?>