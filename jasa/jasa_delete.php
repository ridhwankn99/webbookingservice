<?php
require_once "../koneksi.php";
require_once "../functions.php";

check_login();

$mekanikid = $_GET['jasaid'];
$conn = open_connection();
$query = "DELETE FROM jasa WHERE jasaid = '$jasaid'";

$hasil = mysqli_query($conn, $query);

if ($hasil) {
    $url = BASE_URL . "jasa/jasa.php";
    header("Location: $url");
}else {
    echo "Gagaal menghapus data $mekanikid: ". mysqli_error($conn);
}
?>