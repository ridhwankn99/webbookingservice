<?php
require_once "../koneksi.php";
require_once "../functions.php";

check_login();

$mekanikid = $_GET['mekanikid'];
$conn = open_connection();
$query = "DELETE FROM mekanik WHERE mekanikid = '$mekanikid'";

$hasil = mysqli_query($conn, $query);

if ($hasil) {
    $url = BASE_URL . "mekanik/mekanik.php";
    header("Location: $url");
}else {
    echo "Gagaal menghapus data $mekanikid: ". mysqli_error($conn);
}
?>